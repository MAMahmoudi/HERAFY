<?php

namespace app\core;

class App
{

    //Default class, method and parameters
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    // Loads the controller when an App is instanciated in index.php ---> $app = new App;
    // URL format: /Controller/method/param1/param2 ... or /Controller/param1 (calls index)
    public function __construct()
    {
        Start_Session();

        $url = $this->parseUrl();
        if (isset($url[0])) {
            // Look for the controller file without caring about the case: /contact_us --> Contact_Us.php
            $Controller_Name = $this->Find_Controller($url[0]);
            if ($Controller_Name !== null) {
                $this->controller = $Controller_Name;
            } else {
                //if there is no page then route to 404 error
                $this->controller = "_404";
            }
            unset($url[0]);
        }

        require_once(My_App_Path . '/controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;

        //check if the method exists (only the public methods written in the controller itself)
        if (isset($url[1]) && $this->Is_Action($url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        //check if the array exists else return empty array
        $this->params = $url ? array_values($url) : [];

        // The next line will call a function specified by $this->method
        // which is in the class $this->controller
        // and give it a set of parameters specified by $this->params
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (\ArgumentCountError $Error) {
            $this->controller->Not_Found();
        }
    }

    public function parseUrl()
    {
        //It will split the url using explode with / as parameter
        if (isset($_GET['url']) && is_string($_GET['url']) && trim($_GET['url'], '/') !== '') {
            return explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }

    private function Find_Controller($Name)
    {
        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $Name)) {
            return null;
        }
        foreach (glob(My_App_Path . '/controllers/*.php') as $File_Path) {
            $Controller_Name = basename($File_Path, '.php');
            if (strcasecmp($Controller_Name, $Name) === 0 && $Controller_Name !== '_404') {
                return $Controller_Name;
            }
        }
        return null;
    }

    private function Is_Action($Method)
    {
        if (!preg_match('/^[A-Za-z][A-Za-z0-9_]*$/', $Method) || !method_exists($this->controller, $Method)) {
            return false;
        }
        $Reflection = new \ReflectionMethod($this->controller, $Method);
        return $Reflection->isPublic()
            && !$Reflection->isStatic()
            && $Reflection->getDeclaringClass()->getName() === get_class($this->controller);
    }
}
