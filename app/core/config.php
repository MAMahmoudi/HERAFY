<?php

// All constants are defined here
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('My_Files_Root', 'http://localhost:8080/HERAFY/public/');
    define('My_Server_Name', 'localhost');
    define('My_DataBase_Connection_User', 'root');
    define('My_DataBase_Connection_PassWord', '');
    define('My_DataBase_Name', 'foodz');
} else {
    define('My_Files_Root', 'https://www.mywebsite.dz/');
    define('My_Server_Name', 'localhost');
    define('My_DataBase_Connection_User', 'root');
    define('My_DataBase_Connection_PassWord', '');
    define('My_DataBase_Name', 'foodz');
}
