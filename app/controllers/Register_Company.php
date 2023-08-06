<?php
// This is a controller
class Register_Company extends \app\core\Controller
{
    public function index()
    {
        $My_Data = [];
        /*
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Company_User = new Company_User;
            $Company_User->My_Table = 'Company_User2';

            print_r($_POST);
            if ($Company_User->Verify_My_Data($_POST)) {
                unset($_POST['tasjil_safeha_submit']);
                unset($_POST['Re_kalimat_sir_safeha']);
                $Company_User->Insert($_POST);
                Redirect_to('raisia_safeha');
            }
            $My_Data['My_Errors'] = $Company_User->My_Errors;
        }
        */

        $this->view('Register_Company', $My_Data);
    }
}
