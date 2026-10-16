<?php

trait DataBase_Connection
{
    private function Connection()
    {
        return \app\core\Database::Connection();
    }

    // Runs a select and returns all the rows, or false when nothing was found
    public function Execute_Querry($My_Querry, $My_Data = [])
    {
        $Execute_Querry = $this->Connection()->prepare($My_Querry);
        $Executed = $Execute_Querry->execute($My_Data);
        if ($Executed) {
            $My_Results = $Execute_Querry->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($My_Results) && count($My_Results)) {
                return $My_Results;
            }
        }
        return false;
    }

    // Runs an insert / update / delete and returns the number of affected rows
    public function Execute_Statement($My_Querry, $My_Data = [])
    {
        $Execute_Statement = $this->Connection()->prepare($My_Querry);
        $Execute_Statement->execute($My_Data);
        return $Execute_Statement->rowCount();
    }

    public function Last_Insert_Id()
    {
        return (int)$this->Connection()->lastInsertId();
    }

    public function Disconnect()
    {
        \app\core\Database::Disconnect();
    }
}
