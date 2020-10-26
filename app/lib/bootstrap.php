<?php
class Bootstrap {
    function __construct() {
        global $config;

        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url,1);
        /*if(strpos($url,'?')){
            echo "hey";
        }*/
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        $query_string = $_SERVER['QUERY_STRING'];

        /*echo '<pre>';
        print_r($_SERVER);
        print_r($url);
        echo '</pre>';*/

        $controller = "home";
        $action="index";

        if(isset($url[0]) && !empty($url[0])) {
            $controller = $url[0];
        }

        $cpath = $config['CONTROLLER_PATH'] . $controller;
        $file = $cpath . '.php';

        if(!file_exists($file)){
            $controller = 'apperror';
            $action = 'notfound';
            $cpath = $config['CONTROLLER_PATH'] . $controller;
            $file = $cpath . '.php';
        }
        require $file;

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

        /*if(isset($query_string)){
            $q_str = explode("&",$query_string);
            print_r($q_str);
        }*/
        $method_checker = method_exists($controller,$action);
        if($method_checker){
            $class->{$action}($param1);
        }

    }

}