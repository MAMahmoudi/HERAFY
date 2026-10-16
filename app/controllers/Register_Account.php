<?php

// This is a controller
class Register_Account extends \app\core\Controller
{
    public function index()
    {
        if (Is_Logged_In()) {
            Redirect_To('Account_Page');
        }

        $My_Data = ['Services' => (new Service)->Search_For([], 100)];

        if (Is_Post()) {
            Verify_Csrf();
            $Account_User = new Account_User;
            if ($Account_User->Verify_My_Data($_POST)) {
                $id = $Account_User->Register($_POST);
                Login_User('account', $Account_User->Find_By_Id($id));
                Flash('success', 'تم إنشاء حسابك بنجاح، أكمل ملفك الشخصي ليجدك الزبائن بسهولة');
                Redirect_To('DashBoard');
            }
            $My_Data['My_Errors'] = $Account_User->My_Errors;
        }

        $this->view('Register_Account', $My_Data);
    }
}
