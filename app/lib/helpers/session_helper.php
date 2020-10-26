<?php
class SessionHelper{
    public function __construct(){
    }
    public function getSession($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] :'';
    }
    public function setSession($key,$value){
        $_SESSION[$key]= $value;
    }
    public function unsetSession($key){
        unset($_SESSION[$key]);
    }
}