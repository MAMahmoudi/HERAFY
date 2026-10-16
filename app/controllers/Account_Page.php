<?php

// This is a controller
// The news feed of a logged in craftsman or company
class Account_Page extends \app\core\Controller
{
    public function index()
    {
        Require_Login();
        $User = Current_User();

        if ($User['type'] === 'account') {
            $Profile = (new Account_User)->Find_Profile($User['id']);
            $Stats = [
                'مشاهدات ملفك' => $Profile['profile_views'] ?? 0,
                'منشوراتك' => (new Post)->Count(['author_type' => 'account', 'author_id' => $User['id']]),
                'الشركات الراعية' => (new Sponsorship)->Count(['account_id' => $User['id']]),
            ];
        } else {
            $Profile = (new Company_User)->Find_By_Id($User['id']);
            $Stats = [
                'منتجاتك' => (new Product)->Count(['company_id' => $User['id']]),
                'منشوراتك' => (new Post)->Count(['author_type' => 'company', 'author_id' => $User['id']]),
                'الحرفيون المدعومون' => (new Sponsorship)->Count(['company_id' => $User['id']]),
            ];
        }

        if (!$Profile) {
            // The account was deleted while logged in
            Logout_User();
            Redirect_To('Login');
        }

        $this->view('Account_Page', [
            'User' => $User,
            'Profile' => $Profile,
            'Stats' => $Stats,
            'Posts' => (new Post)->Feed([], 30),
            'Services' => (new Service)->Most_Requested(5),
            'People' => (new Account_User)->Suggestions($User['type'] === 'account' ? $User['id'] : 0, 3),
            'Products' => (new Product)->Latest(1),
        ]);
    }
}
