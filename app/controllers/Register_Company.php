<?php

// This is a controller
class Register_Company extends \app\core\Controller
{
    public function index()
    {
        if (Is_Logged_In()) {
            Redirect_To('Account_Page');
        }

        $My_Data = [];

        if (Is_Post()) {
            Verify_Csrf();
            $Company_User = new Company_User;
            if ($Company_User->Verify_My_Data($_POST)) {
                $id = $Company_User->Register($_POST);
                Login_User('company', $Company_User->Find_By_Id($id));
                Flash('success', 'تم إنشاء صفحة شركتك بنجاح، أضف شعارك ووصف نشاطك');
                Redirect_To('DashBoard');
            }
            $My_Data['My_Errors'] = $Company_User->My_Errors;
        }

        $this->view('Register_Company', $My_Data);
    }
}
