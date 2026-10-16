<?php

// This is a controller
// Publishing and deleting posts (forms of Account_Page, Profile, Company_Page and DashBoard)
class Posts extends \app\core\Controller
{
    public function index()
    {
        Redirect_To('Account_Page');
    }

    public function create()
    {
        Require_Login();
        if (!Is_Post()) {
            Redirect_To('Account_Page');
        }
        Verify_Csrf();
        $User = Current_User();

        $Post = new Post;
        if (!$Post->Verify_My_Data($_POST)) {
            foreach ($Post->My_Errors as $Error) {
                Flash('error', $Error);
            }
            Redirect_Back('Account_Page');
        }

        $Image = Upload_Image($_FILES['image'] ?? null, 'posts', $Upload_Error);
        if ($Image === false) {
            Flash('error', $Upload_Error);
            Redirect_Back('Account_Page');
        }

        $Post->Insert([
            'author_type' => $User['type'],
            'author_id' => $User['id'],
            'body' => Clean_String($_POST['body']),
            'image' => $Image,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Flash('success', 'تم نشر منشورك');
        Redirect_Back('Account_Page');
    }

    public function delete($id = 0)
    {
        Require_Login();
        if (!Is_Post()) {
            Redirect_To('Account_Page');
        }
        Verify_Csrf();
        $User = Current_User();

        $Post = new Post;
        $Row = $Post->Single_Result(['id' => (int)$id, 'author_type' => $User['type'], 'author_id' => $User['id']]);
        if ($Row) {
            $Post->Delete(['id' => $Row['id']]);
            Delete_Upload($Row['image']);
            Flash('success', 'تم حذف المنشور');
        }
        Redirect_Back('Account_Page');
    }
}
