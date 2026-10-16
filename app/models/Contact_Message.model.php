<?php

// A message sent with the "Contact us" form
class Contact_Message
{
    use Model;

    public $My_Table = 'contact_messages';
    public $My_Columns = ['name', 'email', 'subject', 'message'];

    public function Verify_My_Data($My_Data)
    {
        $this->My_Errors = [];

        if (empty(trim($My_Data['name'] ?? ''))) {
            $this->My_Errors['name'] = "الرجاء ادخال الاسم";
        }
        if (!filter_var(trim($My_Data['email'] ?? ''), FILTER_VALIDATE_EMAIL)) {
            $this->My_Errors['email'] = "الرجاء ادخال بريد إلكتروني صحيح";
        }
        if (empty(trim($My_Data['subject'] ?? ''))) {
            $this->My_Errors['subject'] = "الرجاء ادخال الموضوع";
        }
        if (empty(trim($My_Data['message'] ?? ''))) {
            $this->My_Errors['message'] = "الرجاء كتابة الرسالة";
        }

        return empty($this->My_Errors);
    }
}
