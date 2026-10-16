<?php

// A company sponsoring a craftsman
class Sponsorship
{
    use Model;

    public $My_Table = 'sponsorships';
    public $My_Columns = ['company_id', 'account_id'];

    public function Exists($Company_Id, $Account_Id)
    {
        return (bool)$this->Single_Result(['company_id' => (int)$Company_Id, 'account_id' => (int)$Account_Id]);
    }

    // Companies sponsoring a craftsman
    public function Sponsors_Of($Account_Id)
    {
        return $this->Execute_Querry(
            "select c.id, c.name, c.logo from sponsorships sp
             join company_users c on c.id = sp.company_id
             where sp.account_id = :id order by sp.id desc",
            ['id' => (int)$Account_Id]
        ) ?: [];
    }

    // Craftsmen sponsored by a company
    public function Sponsored_By($Company_Id)
    {
        return $this->Execute_Querry(
            "select a.id, a.first_name, a.last_name, a.avatar, s.name as service_name from sponsorships sp
             join account_users a on a.id = sp.account_id
             left join services s on s.id = a.service_id
             where sp.company_id = :id order by sp.id desc",
            ['id' => (int)$Company_Id]
        ) ?: [];
    }
}
