<?php

// Creates the tables (and the demo data) of the configured database.
//   php database/setup.php           create what is missing
//   php database/setup.php --fresh   SQLite only: delete the file and start again
//   php database/setup.php --no-demo only the list of crafts, no demo accounts
// For MySQL create an empty database first (utf8mb4) and set the HERAFY_DB_* variables (see README.md).

if (PHP_SAPI !== 'cli') {
    exit("Run this script from the command line\n");
}

require_once(__DIR__ . '/../app/core/config.php');
require_once(__DIR__ . '/../app/core/Database.php');

$Fresh = in_array('--fresh', $argv, true);
$With_Demo_Data = !in_array('--no-demo', $argv, true);

if (My_DataBase_Driver === 'sqlite') {
    if ($Fresh && file_exists(My_SQLite_Path)) {
        unlink(My_SQLite_Path);
    }
    if (!is_dir(dirname(My_SQLite_Path))) {
        mkdir(dirname(My_SQLite_Path), 0775, true);
    }
    $Connection = new PDO('sqlite:' . My_SQLite_Path);
    $Connection->exec('PRAGMA foreign_keys = ON');
} else {
    $Connection = new PDO(
        "mysql:host=" . My_Server_Name . ";port=" . My_DataBase_Port . ";dbname=" . My_DataBase_Name . ";charset=utf8mb4",
        My_DataBase_Connection_User,
        My_DataBase_Connection_PassWord
    );
}
$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

\app\core\Database::Install($Connection, $With_Demo_Data);

foreach (['services', 'account_users', 'company_users', 'products', 'posts', 'sponsorships'] as $Table) {
    echo str_pad($Table, 16), $Connection->query("select count(*) from $Table")->fetchColumn(), " rows\n";
}
echo "Database ready (" . My_DataBase_Driver . ")\n";