<?php

namespace app\core;

// All constants are defined here.
// Every value can be overridden with an environment variable (see README.md),
// and anything already defined (for example by the test bootstrap) is kept.

function Config_Value($Name, $Default)
{
    $Value = getenv($Name);
    return ($Value === false || $Value === '') ? $Default : $Value;
}

function Define_Once($Name, $Value)
{
    if (!defined($Name)) {
        define($Name, $Value);
    }
}

// Absolute paths
Define_Once('My_Root_Path', dirname(__DIR__, 2));
Define_Once('My_App_Path', My_Root_Path . '/app');
Define_Once('My_Public_Path', My_Root_Path . '/public');
Define_Once('My_Uploads_Path', My_Public_Path . '/uploads');

// Base URL of the public folder, e.g. "/HERAFY/public/" under XAMPP or "/" with `php -S`
function Detect_Files_Root()
{
    $Base_Url = Config_Value('HERAFY_BASE_URL', '');
    if ($Base_Url !== '') {
        return rtrim($Base_Url, '/') . '/';
    }
    if (PHP_SAPI === 'cli' || PHP_SAPI === 'cli-server' || empty($_SERVER['SCRIPT_NAME'])) {
        return '/';
    }
    $Directory = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    return rtrim($Directory, '/') . '/';
}
Define_Once('My_Files_Root', Detect_Files_Root());

// Database: "sqlite" works out of the box, "mysql" for XAMPP / production
Define_Once('My_DataBase_Driver', Config_Value('HERAFY_DB_DRIVER', 'sqlite'));
Define_Once('My_SQLite_Path', Config_Value('HERAFY_SQLITE_PATH', My_Root_Path . '/database/herafy.sqlite'));
Define_Once('My_Server_Name', Config_Value('HERAFY_DB_HOST', 'localhost'));
Define_Once('My_DataBase_Port', Config_Value('HERAFY_DB_PORT', '3306'));
Define_Once('My_DataBase_Name', Config_Value('HERAFY_DB_NAME', 'herafy'));
Define_Once('My_DataBase_Connection_User', Config_Value('HERAFY_DB_USER', 'root'));
Define_Once('My_DataBase_Connection_PassWord', Config_Value('HERAFY_DB_PASSWORD', ''));
// Fill a freshly created database with demo craftsmen, companies and posts
Define_Once('My_Seed_Demo_Data', Config_Value('HERAFY_SEED_DEMO', '1') === '1');

// Uploads
Define_Once('My_Max_Upload_Size', 2 * 1024 * 1024);

// Show PHP errors in the browser (development only)
Define_Once('My_Debug', Config_Value('HERAFY_DEBUG', '0') === '1');
