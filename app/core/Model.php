<?php

trait Model
{

    use DataBase_Connection;

    // Tnside the trait Model we have to define the CRUD methods
    // CRUD = Create, Read, Update, Delete
    // This way we can use these methods just by providing the table name and data
    // $My_Table = table name
    public $My_Table;

    public $My_Errors = [];

    public function Single_Result($My_Data)
    {
        $keys = array_keys($My_Data);
        $My_Querry = "select * from $this->My_Table where ";
        foreach ($keys as $key) {
            $My_Querry .= $key . " = :" . $key . " && ";
        }
        $My_Querry = trim($My_Querry, " && ");
        print_r($My_Querry);
        $My_Results = $this->Execute_Querry($My_Querry, $My_Data);
        if ($My_Results) {
            return $My_Results[0];
        } else {
            return false;
        }
    }

    public function Search_For($My_Data)
    {
        $keys = array_keys($My_Data);
        $My_Querry = "select * from $this->My_Table where ";
        foreach ($keys as $key) {
            $My_Querry .= $key . " = :" . $key . " && ";
        }
        $My_Querry = trim($My_Querry, " && ");
        return $this->Execute_Querry($My_Querry, $My_Data);
    }

    public function Insert($My_Data)
    {
        $keys = array_keys($My_Data);

        $My_Querry = "insert into $this->My_Table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        print_r($My_Querry);
        $this->Execute_Querry($My_Querry, $My_Data);
        return false;
    }

    public function Update($id, $My_Data)
    {
        $keys = array_keys($My_Data);
        $My_Querry = "select * from $this->My_Table where ";
        foreach ($keys as $key) {
            $My_Querry .= $key . " = :" . $key . " && ";
        }
        $My_Querry = trim($My_Querry, " && ");
        $this->Execute_Querry($My_Querry, $My_Data);
        return false;
    }

    public function Delete($My_Data)
    {
        // Still not working
        $keys = array_keys($My_Data);
        $My_Querry = "delete from $this->My_Table where ";
        $this->Execute_Querry($My_Querry, $My_Data);
    }
}
