<?php

trait Model
{

    use DataBase_Connection;

    // Inside the trait Model we define the CRUD methods
    // CRUD = Create, Read, Update, Delete
    // This way we can use these methods just by providing the table name and data.
    // Every class using this trait must declare:
    //   public $My_Table   = table name
    //   public $My_Columns = columns that may be written / searched (protects the query from unknown keys)

    public $My_Errors = [];
    public $My_Order = 'id desc';

    // Keeps only the known columns of the table
    public function Only_Columns($My_Data)
    {
        return array_intersect_key($My_Data, array_flip($this->My_Columns));
    }

    private function Where_Clause($My_Data)
    {
        $Conditions = [];
        foreach (array_keys($My_Data) as $key) {
            if ($key !== 'id' && !in_array($key, $this->My_Columns, true)) {
                throw new InvalidArgumentException("Unknown column $key in $this->My_Table");
            }
            $Conditions[] = $key . " = :" . $key;
        }
        return $Conditions ? " where " . implode(" and ", $Conditions) : "";
    }

    public function Single_Result($My_Data)
    {
        $My_Querry = "select * from $this->My_Table" . $this->Where_Clause($My_Data) . " limit 1";
        $My_Results = $this->Execute_Querry($My_Querry, $My_Data);
        if ($My_Results) {
            return $My_Results[0];
        }
        return false;
    }

    public function Find_By_Id($id)
    {
        return $this->Single_Result(['id' => (int)$id]);
    }

    public function Search_For($My_Data = [], $Limit = 100)
    {
        $My_Querry = "select * from $this->My_Table" . $this->Where_Clause($My_Data)
            . " order by $this->My_Order limit " . (int)$Limit;
        return $this->Execute_Querry($My_Querry, $My_Data) ?: [];
    }

    public function Count($My_Data = [])
    {
        $My_Querry = "select count(*) as total from $this->My_Table" . $this->Where_Clause($My_Data);
        $My_Results = $this->Execute_Querry($My_Querry, $My_Data);
        return $My_Results ? (int)$My_Results[0]['total'] : 0;
    }

    // Returns the id of the new row
    public function Insert($My_Data)
    {
        $My_Data = $this->Only_Columns($My_Data);
        $keys = array_keys($My_Data);

        $My_Querry = "insert into $this->My_Table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        $this->Execute_Statement($My_Querry, $My_Data);
        return $this->Last_Insert_Id();
    }

    public function Update($id, $My_Data)
    {
        $My_Data = $this->Only_Columns($My_Data);
        if (empty($My_Data)) {
            return false;
        }
        $Assignments = [];
        foreach (array_keys($My_Data) as $key) {
            $Assignments[] = $key . " = :" . $key;
        }
        $My_Querry = "update $this->My_Table set " . implode(", ", $Assignments) . " where id = :id";
        $My_Data['id'] = (int)$id;
        return $this->Execute_Statement($My_Querry, $My_Data) > 0;
    }

    // Deletes the rows matching every condition, e.g. Delete(['id' => 3, 'company_id' => 1])
    public function Delete($My_Data)
    {
        if (empty($My_Data)) {
            throw new InvalidArgumentException("Refusing to delete every row of $this->My_Table");
        }
        $My_Querry = "delete from $this->My_Table" . $this->Where_Clause($My_Data);
        return $this->Execute_Statement($My_Querry, $My_Data);
    }
}
