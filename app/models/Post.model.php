<?php

// A post of a craftsman (portfolio, finished job) or of a company (news, offers)
class Post
{
    use Model;

    public $My_Table = 'posts';
    public $My_Columns = ['author_type', 'author_id', 'body', 'image', 'created_at'];

    public function Verify_My_Data($My_Data)
    {
        $this->My_Errors = [];

        $Body = trim($My_Data['body'] ?? '');
        if ($Body === '') {
            $this->My_Errors['body'] = "لا يمكن نشر منشور فارغ";
        } elseif (mb_strlen($Body) > 2000) {
            $this->My_Errors['body'] = "المنشور طويل جدا (2000 حرف كحد أقصى)";
        }

        return empty($this->My_Errors);
    }

    // Posts with the details of their author.
    // $Filters: author_type + author_id for one author, with_image => true for the home page projects
    public function Feed($Filters = [], $Limit = 30)
    {
        $Conditions = [];
        $My_Data = [];
        if (!empty($Filters['author_type'])) {
            $Conditions[] = "p.author_type = :author_type and p.author_id = :author_id";
            $My_Data['author_type'] = $Filters['author_type'];
            $My_Data['author_id'] = (int)$Filters['author_id'];
        }
        if (!empty($Filters['with_image'])) {
            $Conditions[] = "p.image is not null and p.author_type = 'account'";
        }
        $My_Querry = "select p.*,
                a.first_name, a.last_name, a.avatar, a.city, s.name as service_name,
                c.name as company_name, c.logo as company_logo
            from posts p
            left join account_users a on p.author_type = 'account' and a.id = p.author_id
            left join services s on s.id = a.service_id
            left join company_users c on p.author_type = 'company' and c.id = p.author_id
            where (a.id is not null or c.id is not null)"
            . ($Conditions ? " and " . implode(" and ", $Conditions) : "")
            . " order by p.created_at desc, p.id desc limit " . (int)$Limit;
        return $this->Execute_Querry($My_Querry, $My_Data) ?: [];
    }
}
