<?php

// This is a controller
class Logout extends \app\core\Controller
{
    public function index()
    {
        if (Is_Post()) {
            Verify_Csrf();
            Logout_User();
            Flash('success', 'تم تسجيل الخروج');
        }
        Redirect_To('');
    }
}
