<?php

// This is a controller
// Public page of a craftsman: /Profile/{id}
class Profile extends \app\core\Controller
{
    public function index($id = null)
    {
        if ($id === null) {
            Require_Login('account');
            $id = Current_User()['id'];
        }

        $Account_User = new Account_User;
        $Profile = ctype_digit((string)$id) ? $Account_User->Find_Profile($id) : false;
        if (!$Profile) {
            $this->Not_Found();
        }

        $Is_Owner = Is_Logged_In('account') && Current_User()['id'] === (int)$Profile['id'];
        if (!$Is_Owner && empty($_SESSION['Viewed_Profiles'][$Profile['id']])) {
            // Count each visitor once per session
            $Account_User->Add_Profile_View($Profile['id']);
            $_SESSION['Viewed_Profiles'][$Profile['id']] = true;
        }

        $Sponsorship = new Sponsorship;
        $this->view('Profile', [
            'Profile' => $Profile,
            'Is_Owner' => $Is_Owner,
            'Posts' => (new Post)->Feed(['author_type' => 'account', 'author_id' => $Profile['id']], 50),
            'Sponsors' => $Sponsorship->Sponsors_Of($Profile['id']),
            'Is_Sponsor' => Is_Logged_In('company') && $Sponsorship->Exists(Current_User()['id'], $Profile['id']),
            'People' => $Account_User->Suggestions($Profile['id'], 3),
            'Products' => (new Product)->Latest(1),
        ]);
    }

    // A company starts / stops sponsoring the craftsman
    public function sponsor($id = 0)
    {
        Require_Login('company');
        if (!Is_Post()) {
            Redirect_To('Profile/' . (int)$id);
        }
        Verify_Csrf();

        if (!(new Account_User)->Find_By_Id($id)) {
            $this->Not_Found();
        }
        $Company_Id = Current_User()['id'];
        $Sponsorship = new Sponsorship;
        if ($Sponsorship->Exists($Company_Id, $id)) {
            $Sponsorship->Delete(['company_id' => $Company_Id, 'account_id' => (int)$id]);
            Flash('success', 'تم إلغاء الرعاية');
        } else {
            $Sponsorship->Insert(['company_id' => $Company_Id, 'account_id' => (int)$id]);
            Flash('success', 'أصبحت شركتك راعية لهذا الحرفي');
        }
        Redirect_To('Profile/' . (int)$id);
    }
}
