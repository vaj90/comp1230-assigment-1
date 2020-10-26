<?php
class Account extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->view->render('account/index');
    }
    public function login($args) {
        $this->view->render('account/login');
    }
    public function logout() {
        //global $session_helper;
        //$session_helper->unsetSession('account');
        echo "logout<br>";
        session_destroy();
        header("Location:index.php");
    }
}