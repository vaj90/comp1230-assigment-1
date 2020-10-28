<?php
class Controller{
    function __construct() {
        $this->view = new View(); 
    }
    public function loadModel($name){
        global $config;
        $path = $config['MODEL_PATH'] . $name . '_model.php';
        if(file_exists($path)){
            require $path;
        }
    }
}