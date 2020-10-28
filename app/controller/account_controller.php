<?php
class AccountController extends Controller {
    function __construct() {
        parent::__construct();
        parent::loadModel('account');
        Session::init();
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
        $redirect = URL . 'account/login';
        if($username=='admin' && $password=='admin'){
            $am = serialize($account);
            Session::set("user", $am);
            Session::set("LoggedIn", true);
            $redirect = URL . 'dashboard';
            header('Location: '. $redirect);
        }
        $this->errorMessage = "Invalid username and password, please try again!";
    }
    public function logout() {
        Session::destroy(); 
        echo "logout<br>";
        
        header('Location: '  . URL . '/account ');
        exit;
    }
}