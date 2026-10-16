<?php

// A craftsman account
class Account_User
{
    use Model;

    public $My_Table = 'account_users';
    public $My_Columns = ['first_name', 'last_name', 'email', 'password_hash', 'service_id', 'city', 'phone', 'bio', 'avatar', 'cover', 'profile_views'];

    // $For_Update: the profile form of the dashboard (no email, password optional)
    public function Verify_My_Data($My_Data, $For_Update = false)
    {
        $this->My_Errors = [];

        if (empty(trim($My_Data['first_name'] ?? ''))) {
            $this->My_Errors['first_name'] = "الرجاء ادخال الاسم";
        }

        if (empty(trim($My_Data['last_name'] ?? ''))) {
            $this->My_Errors['last_name'] = "الرجاء ادخال اللقب";
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

        if (!empty($My_Data['service_id']) && !(new Service)->Find_By_Id($My_Data['service_id'])) {
            $this->My_Errors['service_id'] = "الرجاء اختيار حرفة من القائمة";
        }

        if (!empty($My_Data['phone']) && !preg_match('/^[0-9 +\-]{6,20}$/', $My_Data['phone'])) {
            $this->My_Errors['phone'] = "رقم الهاتف غير صالح";
        }

        return empty($this->My_Errors);
    }

    // Creates the account from the registration form and returns its id
    public function Register($My_Data)
    {
        return $this->Insert([
            'first_name' => Clean_String($My_Data['first_name']),
            'last_name' => Clean_String($My_Data['last_name']),
            'email' => strtolower(trim($My_Data['email'])),
            'password_hash' => password_hash($My_Data['password'], PASSWORD_DEFAULT),
            'service_id' => !empty($My_Data['service_id']) ? (int)$My_Data['service_id'] : null,
            'city' => Clean_String($My_Data['city'] ?? '') ?: null,
            'phone' => Clean_String($My_Data['phone'] ?? '') ?: null,
        ]);
    }

    // Returns the account when the email and password are correct
    public function Authenticate($Email, $Password)
    {
        $User = $this->Single_Result(['email' => strtolower(trim((string)$Email))]);
        if ($User && password_verify((string)$Password, $User['password_hash'])) {
            return $User;
        }
        return false;
    }

    // An account with the name of its craft
    public function Find_Profile($id)
    {
        $My_Results = $this->Execute_Querry(
            "select a.*, s.name as service_name from account_users a
             left join services s on s.id = a.service_id
             where a.id = :id",
            ['id' => (int)$id]
        );
        return $My_Results ? $My_Results[0] : false;
    }

    // Search craftsmen by free text (name, craft, city, bio), craft and city
    public function Search_Craftsmen($Text = '', $Service_Id = null, $City = '', $Limit = 50)
    {
        $Conditions = [];
        $My_Data = [];
        if ($Text !== '') {
            $Conditions[] = "(a.first_name like :t1 or a.last_name like :t2 or a.bio like :t3 or a.city like :t4 or s.name like :t5 or s.slug like :t6)";
            for ($i = 1; $i <= 6; $i++) {
                $My_Data["t$i"] = '%' . $Text . '%';
            }
        }
        if ($Service_Id) {
            $Conditions[] = "a.service_id = :service_id";
            $My_Data['service_id'] = (int)$Service_Id;
        }
        if ($City !== '') {
            $Conditions[] = "a.city like :city";
            $My_Data['city'] = '%' . $City . '%';
        }
        $My_Querry = "select a.*, s.name as service_name from account_users a
                      left join services s on s.id = a.service_id"
            . ($Conditions ? " where " . implode(" and ", $Conditions) : "")
            . " order by a.profile_views desc, a.id desc limit " . (int)$Limit;
        return $this->Execute_Querry($My_Querry, $My_Data) ?: [];
    }

    // Other craftsmen to show in the side bars
    public function Suggestions($Except_Id = 0, $Limit = 3)
    {
        return $this->Execute_Querry(
            "select a.*, s.name as service_name from account_users a
             left join services s on s.id = a.service_id
             where a.id <> :id order by a.profile_views desc limit " . (int)$Limit,
            ['id' => (int)$Except_Id]
        ) ?: [];
    }

    public function Cities()
    {
        $My_Results = $this->Execute_Querry("select distinct city from account_users where city is not null and city <> '' order by city");
        return $My_Results ? array_column($My_Results, 'city') : [];
    }

    public function Add_Profile_View($id)
    {
        $this->Execute_Statement("update account_users set profile_views = profile_views + 1 where id = :id", ['id' => (int)$id]);
    }
}
