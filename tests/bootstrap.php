<?php

// Every test runs against a fresh in-memory SQLite database
define('My_DataBase_Driver', 'sqlite');
define('My_SQLite_Path', ':memory:');
define('My_Seed_Demo_Data', true);
define('My_Files_Root', '/');

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../app/core/init.php');

function Fresh_Test_Database($With_Demo_Data = true)
{
    $Connection = new PDO('sqlite::memory:', null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $Connection->exec('PRAGMA foreign_keys = ON');
    \app\core\Database::Install($Connection, $With_Demo_Data);
    \app\core\Database::Set_Connection($Connection);
    $_SESSION = [];
    $_POST = [];
    return $Connection;
}
