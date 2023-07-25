<?php
// This is a controller
class Home extends Controller
{
    public function index()
    {
        //Login tentatives
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['AccountLogin_submit'])) {
                $Account_User = new Account_User;
                $Account_User->My_Table = 'Account_User2';
                unset($_POST['AccountLogin_submit']);

                /*
                if($Account_User->tahkik($_POST)){
                    unset($_POST['AccountLogin_submit']);
                    $Account_User->idafa($_POST);
                    Redirect_To('raisia');
                }*/
                $arr['Account_User'] = $_POST['Account_User'];
                $natija = $Account_User->Single_Result($_POST);
                if ($natija) {
                    // if ($natija->kalimat_sir === $_POST['kalimat_sir']){
                    $_SESSION['Account_User'] = $natija;
                    Redirect_To('raisia');
                    //}
                    //
                    /* else{
                        $arr['My_Errors'] = "كلمة المرور غير صحيحة";
                        $this->view('home', $arr);
                    }*/
                    Redirect_To('raisia');
                } else {
                    $arr['My_Errors'] = $Account_User->My_Errors;
                    $this->view('home', $arr);
                }
            }
            if (isset($_POST['PageLogin_submit'])) {
                $Restaurant_User = new Restaurant_User;
                $Restaurant_User->My_Table = 'Restaurant_User2';
                unset($_POST['PageLogin_submit']);

                /*
                if($Account_User->tahkik($_POST)){
                    unset($_POST['AccountLogin_submit']);
                    $Account_User->idafa($_POST);
                    Redirect_To('raisia');
                }*/
                $arr['Restaurant_User'] = $_POST['Restaurant_User'];
                $natija = $Restaurant_User->Single_Result($_POST);
                if ($natija) {
                    // if ($natija->kalimat_sir === $_POST['kalimat_sir']){
                    $_SESSION['Restaurant_User'] = $natija;
                    Redirect_To('raisia_safeha');
                    //}
                    //
                    /* else{
                        $arr['My_Errors'] = "كلمة المرور غير صحيحة";
                        $this->view('home', $arr);
                    }*/
                    //Redirect_To('raisia_safeha');
                } else {
                    $arr['My_Errors'] = $Account_User->My_Errors;
                    $this->view('home', $arr);
                }
            }
        }


        $this->view('home');
    }
}
