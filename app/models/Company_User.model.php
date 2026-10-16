<?php

// A company page
class Company_User
{
    use Model;

    public $My_Table = 'company_users';
    public $My_Columns = ['name', 'email', 'password_hash', 'city', 'phone', 'website', 'description', 'logo', 'cover'];

    public function Verify_My_Data($My_Data, $For_Update = false)
    {
        $this->My_Errors = [];

        if (empty(trim($My_Data['name'] ?? ''))) {
            $this->My_Errors['name'] = "الرجاء ادخال اسم الشركة";
        }

        if (!$For_Update) {
            $Email = trim($My_Data['email'] ?? '');
            if ($Email === '') {
                $this->My_Errors['email'] = "الرجاء ادخال البريد الإلكتروني";
            } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $this->My_Errors['email'] = "الرجاء التأكد من البريد الإلكتروني";
            } elseif ($this->Single_Result(['email' => strtolower($Email)])) {
                $this->My_Errors['email'] = "هذا البريد الإلكتروني مستعمل من قبل";
            }
        }

        if (!$For_Update || !empty($My_Data['password'])) {
            Verify_Password($My_Data, $this->My_Errors);
        }

        if (!empty($My_Data['website']) && !filter_var($My_Data['website'], FILTER_VALIDATE_URL)) {
            $this->My_Errors['website'] = "الرجاء ادخال رابط صحيح يبدأ بـ https://";
        }

        if (!empty($My_Data['phone']) && !preg_match('/^[0-9 +\-]{6,20}$/', $My_Data['phone'])) {
            $this->My_Errors['phone'] = "رقم الهاتف غير صالح";
        }

        return empty($this->My_Errors);
    }

    public function Register($My_Data)
    {
        return $this->Insert([
            'name' => Clean_String($My_Data['name']),
            'email' => strtolower(trim($My_Data['email'])),
            'password_hash' => password_hash($My_Data['password'], PASSWORD_DEFAULT),
            'city' => Clean_String($My_Data['city'] ?? '') ?: null,
            'phone' => Clean_String($My_Data['phone'] ?? '') ?: null,
        ]);
    }

    public function Authenticate($Email, $Password)
    {
        $User = $this->Single_Result(['email' => strtolower(trim((string)$Email))]);
        if ($User && password_verify((string)$Password, $User['password_hash'])) {
            return $User;
        }
        return false;
    }

    public function Search_Companies($Text = '', $Limit = 20)
    {
        if ($Text === '') {
            return $this->Search_For([], $Limit);
        }
        return $this->Execute_Querry(
            "select * from company_users where name like :t1 or description like :t2 or city like :t3
             order by id desc limit " . (int)$Limit,
            ['t1' => "%$Text%", 't2' => "%$Text%", 't3' => "%$Text%"]
        ) ?: [];
    }
}
