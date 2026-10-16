<?php

// A craft (plumber, electrician, ...)
class Service
{
    use Model;

    public $My_Table = 'services';
    public $My_Columns = ['name', 'slug', 'image', 'search_count'];

    public function __construct()
    {
        $this->My_Order = 'name asc';
    }

    // Services ordered by how often they are searched, then by the number of craftsmen
    public function Most_Requested($Limit = 6)
    {
        return $this->Execute_Querry(
            "select s.*, count(a.id) as craftsmen_count from services s
             left join account_users a on a.service_id = s.id
             group by s.id, s.name, s.slug, s.image, s.search_count
             order by s.search_count desc, craftsmen_count desc, s.id asc
             limit " . (int)$Limit
        ) ?: [];
    }

    public function Add_Search($id)
    {
        $this->Execute_Statement("update services set search_count = search_count + 1 where id = :id", ['id' => (int)$id]);
    }
}
