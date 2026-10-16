<?php

// This is a controller
class Login extends \app\core\Controller
{
    public function index()
    {
        if (Is_Logged_In()) {
            Redirect_To('Account_Page');
        }

        $My_Data = ['Type' => ($_GET['type'] ?? 'account') === 'company' ? 'company' : 'account'];

        if (Is_Post()) {
            Verify_Csrf();
            $Type = ($_POST['type'] ?? 'account') === 'company' ? 'company' : 'account';
            $Model = $Type === 'company' ? new Company_User : new Account_User;
            $User = $Model->Authenticate($_POST['email'] ?? '', $_POST['password'] ?? '');
            if ($User) {
                Login_User($Type, $User);
                Flash('success', 'مرحبا بك من جديد');
                Redirect_To($Type === 'company' ? 'Company_Page/' . $User['id'] : 'Account_Page');
            }
            $My_Data['Type'] = $Type;
            $My_Data['My_Errors'] = ['البريد الإلكتروني أو كلمة المرور غير صحيحة'];
        }

        $this->view('Login', $My_Data);
    }
}
