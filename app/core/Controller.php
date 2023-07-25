<?php
require_once('config.php');

class Controller
{
    public function view($view, $My_Data = [])
    {
        if (!empty($My_Data)) {
            extract($My_Data);
        }

        $FilePath = '../app/views/' . $view . '.view.php';
        require_once($FilePath);
    }

    public function model($model)
    {
        $FilePath = '../models/' . $model . '.php';
        if (file_exists($FilePath)) {
            require_once('../models/' . $model . '.php');
            return new $model();
        } else {
            //if there is no page then route to 404 error
            require('../app/views/404.view.php');
        }
    }
}
