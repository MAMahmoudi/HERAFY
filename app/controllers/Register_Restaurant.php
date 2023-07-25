<?php
// This is a controller
class Register_Restaurant extends Controller
{
    public function index()
    {
        $My_Data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Restaurant_User = new Restaurant_User;
            $Restaurant_User->My_Table = 'Restaurant_User2';

            print_r($_POST);
            if ($Restaurant_User->Verify_My_Data($_POST)) {
                unset($_POST['tasjil_safeha_submit']);
                unset($_POST['Re_kalimat_sir_safeha']);
                $Restaurant_User->Insert($_POST);
                Redirect_to('raisia_safeha');
            }
            $My_Data['My_Errors'] = $Restaurant_User->My_Errors;
        }

        $this->view('Register_Restaurant', $My_Data);
    }
}
