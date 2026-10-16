<?php

// A product or service promoted by a company
class Product
{
    use Model;

    public $My_Table = 'products';
    public $My_Columns = ['company_id', 'name', 'description', 'price', 'image'];

    public function Verify_My_Data($My_Data)
    {
        $this->My_Errors = [];

        if (empty(trim($My_Data['name'] ?? ''))) {
            $this->My_Errors['name'] = "الرجاء ادخال اسم المنتج";
        }

        $Price = trim($My_Data['price'] ?? '');
        if ($Price !== '' && (!is_numeric($Price) || $Price < 0)) {
            $this->My_Errors['price'] = "السعر يجب أن يكون رقما موجبا";
        }

        return empty($this->My_Errors);
    }

    // Latest products with the name of their company, for the side bars
    public function Latest($Limit = 3)
    {
        return $this->Execute_Querry(
            "select p.*, c.name as company_name, c.logo as company_logo from products p
             join company_users c on c.id = p.company_id
             order by p.id desc limit " . (int)$Limit
        ) ?: [];
    }
}
