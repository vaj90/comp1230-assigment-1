<?php
class Account extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
        parent::loadModel('account');
    }
    public function index() {
        $this->view->render('account/index');
    }
    public function login($args) {
        $this->view->model = "Allan John Valiente";
        $this->view->render('account/login');
    }
    public function loginsubmit() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account = new AccountModel($username,$password);

        if($username=='admin' && $password=='admin'){
            $am = serialize($account);
            Session::set("user", $am);
            $redirect = URL . 'dashboard';
            header('Location: ' . URL . 'dashboard');
        }

    }
    public function logout() {
        Session::destroy(); 
        echo "logout<br>";
        
        header('Location: '  . URL . '/account ');
        exit;
    }
}