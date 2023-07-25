<?php

spl_autoload_register(function ($classname) {

    require("../app/models/" . ucfirst($classname) . ".model.php");
});
require_once('Controller.php');
require_once('config.php');
require_once('functions.php');
require_once('DataBase_Connection.php');
require_once('Model.php');
require_once('App.php');
