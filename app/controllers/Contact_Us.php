<?php

// This is a controller
class Contact_Us extends \app\core\Controller
{
    public function index()
    {
        $My_Data = [];

        if (Is_Post()) {
            Verify_Csrf();
            $Contact_Message = new Contact_Message;
            if ($Contact_Message->Verify_My_Data($_POST)) {
                $Contact_Message->Insert([
                    'name' => Clean_String($_POST['name']),
                    'email' => trim($_POST['email']),
                    'subject' => Clean_String($_POST['subject']),
                    'message' => Clean_String($_POST['message']),
                ]);
                Flash('success', 'شكرا لك، تم إرسال رسالتك وسنرد عليك في أقرب وقت');
                Redirect_To('Contact_Us');
            }
            $My_Data['My_Errors'] = $Contact_Message->My_Errors;
        }

        $this->view('Contact_Us', $My_Data);
    }
}
