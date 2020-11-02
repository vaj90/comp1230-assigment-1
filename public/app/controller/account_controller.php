<?php
class AccountController extends Controller {
    function __construct() {
        parent::__construct();
        parent::loadModel('account');
    }
    public function index() {
        $this->isAuthenticated();
        /*$ this->view->render is a function the allow to reference
            certain .phtml file to display the UI*/
        $this->view->render('account/index');
    }   
    public function login($args) {
        $this->view->render('account/login');
    }
    public function loginsubmit() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $redirect = URL . 'account/login';
        if($username=='admin' && $password=='admin'){
            Session::set("LoggedIn", true);
            $redirect = URL . 'dashboard';  
            header('Location: '. $redirect);
            exit;
        }
        header('Location: '  . URL . 'account/login');
    }
    public function logout() {
        Session::destroy(); 
        Session::unset("LoggedIn");
        header('Location: '  . URL . 'account/login');
        exit;
    }
}