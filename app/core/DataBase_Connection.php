<?php

trait DataBase_Connection
{
    private $Connection;

    private function Connect()
    {
        $Properties = "mysql:host=" . My_Server_Name . ";dbname=" . My_DataBase_Name . ";port=3366";
        $opts =
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

        try {
            $this->Connection  = new PDO($Properties, My_DataBase_Connection_User, My_DataBase_Connection_PassWord, $opts);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function Execute_Querry($My_Querry, $My_Data = [])
    {
        $this->Connect();
        $Execute_Querry = $this->Connection->prepare($My_Querry);
        $Executed = $Execute_Querry->execute($My_Data);
        if ($Executed) {
            $My_Results = $Execute_Querry->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($My_Results) && count($My_Results)) {
                return $My_Results;
            }
        }
        return false;
    }

    public function Disconnect()
    {
        $this->Connection->close();
    }
}
