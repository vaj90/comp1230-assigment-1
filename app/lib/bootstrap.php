<?php
class Bootstrap {
    function __construct() {
        global $config;
        global $ctrlr;
        global $rq_method;
        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url,1);
    
        $pos_uri = strpos($url,'?') ;
        if($pos_uri> 0){
            $url = substr($url,0,$pos_uri);
        }

        $url = rtrim($url,'/');
        $url = explode('/', $url);

        $rq_method = $_SERVER['REQUEST_METHOD'];
        //$query_string = $_SERVER['QUERY_STRING'];
        /*echo '<pre>';
        print_r($_SERVER);
        print_r($url);
        echo '</pre>';*/

        $controller = "home";
        $action="index";

        if(isset($url[0]) && !empty($url[0])) {
            $controller = $url[0];
        }

        $cpath = $config['CONTROLLER_PATH'] . $controller . '_controller';
        $file = $cpath . '.php';

        if(!file_exists($file)){
            $controller = 'apperror';
            $action = 'notfound';
            $cpath = $config['CONTROLLER_PATH'] . $controller . '_controller';
            $file = $cpath . '.php';
        }

        require $file;
        $ctrlr = $controller;
        $controller = $controller . "Controller";
        $class = new $controller();

        if(isset($url[2])){
            $action = $url[1];
            $param1 = $url[2];
        }
        else{
            if(isset($url[1]) && !empty($url[1])){
                $action = $url[1];
            }
        }
        //Check method and controller if exists
        $method_checker = method_exists($controller,$action);
        if($method_checker){
            $class->{$action}($param1);
        }
        else{
            $controller = 'apperror';
            $action = 'notfound';
            $cpath = $config['CONTROLLER_PATH'] . $controller . '_controller';
            $file = $cpath . '.php';
            require $file;
            $ctrlr = $controller;
            $controller = $controller . "Controller";
            $class = new $controller();
            $class->{$action}();
        }
    }
}