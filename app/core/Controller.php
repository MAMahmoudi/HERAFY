<?php

namespace app\core;

class Controller
{
    public function view($view, $My_Data = [])
    {
        if (!empty($My_Data)) {
            extract($My_Data);
        }

        $FilePath = My_App_Path . '/views/' . $view . '.view.php';
        require($FilePath);
    }

    public function model($model)
    {
        $FilePath = My_App_Path . '/models/' . $model . '.model.php';
        if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $model) && file_exists($FilePath)) {
            require_once($FilePath);
            return new $model();
        }
        return null;
    }

    // Shows the 404 page and stops
    public function Not_Found()
    {
        http_response_code(404);
        $this->view('404');
        exit;
    }
}
