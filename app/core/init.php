<?php

namespace app\core;

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/utils/functions.php');
require_once(__DIR__ . '/Database.php');
require_once(__DIR__ . '/DataBase_Connection.php');
require_once(__DIR__ . '/Model.php');
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/App.php');

// Models are loaded when they are first used: new Account_User --> app/models/Account_User.model.php
spl_autoload_register(function ($Class_Name) {
    $File_Path = My_App_Path . '/models/' . $Class_Name . '.model.php';
    if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $Class_Name) && file_exists($File_Path)) {
        require_once($File_Path);
    }
});

ini_set('display_errors', My_Debug ? '1' : '0');
error_reporting(E_ALL);
