<?php

// This is a controller
// Settings of the logged in craftsman or company
class DashBoard extends \app\core\Controller
{
    public function index()
    {
        Require_Login();
        $User = Current_User();
        $Model = $User['type'] === 'company' ? new Company_User : new Account_User;
        $My_Data = [];

        if (Is_Post()) {
            Verify_Csrf();
            if ($Model->Verify_My_Data($_POST, true)) {
                $Errors = [];
                $Changes = $this->Profile_Changes($User['type'], $Errors);
                if (empty($Errors)) {
                    $Old = $Model->Find_By_Id($User['id']);
                    $Model->Update($User['id'], $Changes);
                    foreach (['avatar', 'logo', 'cover'] as $Image) {
                        if (isset($Changes[$Image]) && $Old[$Image] !== $Changes[$Image]) {
                            Delete_Upload($Old[$Image]);
                        }
                    }
                    Login_User($User['type'], $Model->Find_By_Id($User['id']));
                    Flash('success', 'تم حفظ التعديلات');
                    Redirect_To('DashBoard');
                }
                $My_Data['My_Errors'] = $Errors;
            } else {
                $My_Data['My_Errors'] = $Model->My_Errors;
            }
        }

        $Profile = $User['type'] === 'company' ? $Model->Find_By_Id($User['id']) : $Model->Find_Profile($User['id']);
        $this->view('DashBoard', $My_Data + [
            'User' => $User,
            'Profile' => $Profile,
            'Services' => (new Service)->Search_For([], 100),
            'Posts' => (new Post)->Feed(['author_type' => $User['type'], 'author_id' => $User['id']], 100),
        ]);
    }

    // Values of the form that will be saved
    private function Profile_Changes($Type, &$Errors)
    {
        if ($Type === 'company') {
            $Changes = [
                'name' => Clean_String($_POST['name']),
                'city' => Clean_String($_POST['city'] ?? '') ?: null,
                'phone' => Clean_String($_POST['phone'] ?? '') ?: null,
                'website' => trim($_POST['website'] ?? '') ?: null,
                'description' => Clean_String($_POST['description'] ?? '') ?: null,
            ];
            $Images = ['logo' => 'logos', 'cover' => 'covers'];
        } else {
            $Changes = [
                'first_name' => Clean_String($_POST['first_name']),
                'last_name' => Clean_String($_POST['last_name']),
                'service_id' => !empty($_POST['service_id']) ? (int)$_POST['service_id'] : null,
                'city' => Clean_String($_POST['city'] ?? '') ?: null,
                'phone' => Clean_String($_POST['phone'] ?? '') ?: null,
                'bio' => Clean_String($_POST['bio'] ?? '') ?: null,
            ];
            $Images = ['avatar' => 'avatars', 'cover' => 'covers'];
        }

        foreach ($Images as $Field => $Folder) {
            $Path = Upload_Image($_FILES[$Field] ?? null, $Folder, $Upload_Error);
            if ($Path === false) {
                $Errors[$Field] = $Upload_Error;
            } elseif ($Path !== null) {
                $Changes[$Field] = $Path;
            }
        }

        if (!empty($_POST['password'])) {
            $Changes['password_hash'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        return $Changes;
    }
}
