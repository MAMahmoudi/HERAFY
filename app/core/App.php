<?php
session_start();

class App{

    //Default class, method and parameters
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    // A function that loads the controller when an App is instanciated in index.php ---> $app = new App;
    public function __construct(){
        $url = $this->parseUrl();
        //print_r($url) ;
        if(isset($url[0])){
            //concatenation to get the full path and check if the controller exists
            // which is in $url[0]
            if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php'))
            {

                //Replace with a new instance of this->controller
                $this->controller = ucfirst($url[0]) ;
                // remove it from the array
                unset($url[0]);
            }
            else
            {
                //if there is no page then route to 404 error
                //require ('../app/controllers/_404.php');
                $this->controller = "_404";
            } 
        }

        require_once('../app/controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;

        
        //check if the method exists
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //check if the array exists else return empty array
        $this->params = $url ? array_values($url): [];

        // The next line will call a function specified by $this->method 
        // which is in the class $this->controller
        // and give it a set of parameters specified by$this->params
        call_user_func_array([$this->controller, $this->method], $this->params);
        
        }

    public function parseUrl(){
        //It will split the url using explode with / as parameter
        if(isset($_GET['url'])){
            // rtrim
            // filter_var
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        }
    }

}