<?php

class Account_User
{
    use Model;


    public function Verify_My_Data($My_Data)
    {
        $this->My_Errors = [];

        if (empty($My_Data['ism'])) {
            $this->My_Errors['ism'] = "الرجاء ادخال الاسم";
        }

        if (empty($My_Data['laqab'])) {
            $this->My_Errors['laqab'] = "الرجاء ادخال اللقب";
        }

        if (empty($My_Data['mostakhdim'])) {
            $this->My_Errors['mostakhdim'] = "الرجاء ادخال اسم المستخدم";
        } elseif (!filter_var($My_Data['mostakhdim'], FILTER_VALIDATE_EMAIL)) {
            $this->My_Errors['mostakhdim'] = "الرجاء التأكد من اسم المستخدم";
        }
        if (empty($My_Data['kalimat_sir'])) {
            $this->My_Errors['kalimat_sir'] = "الرجاء ادخال كلمة المرور";
        }

        if (empty($My_Data['Re_kalimat_sir'])) {
            $this->My_Errors['Re_kalimat_sir'] = " الرجاء ادخال كلمة المرور مره اخرى";
        }
        /*
        if($My_Data['Re_kalimat_sir'] != $My_Data['kalimat_sir'])
        {
            $this->My_Errors['Re_kalimat_sir'] = "كلمة المرور غير متطابقة";
        }
       */

        if (empty($this->My_Errors)) {
            return true;
        }
        return false;
    }
}
