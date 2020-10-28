<?php
class DashboardController extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
        parent::loadModel('account');
    }
    public function index() {
        $logged = Session::get("LoggedIn");
        if($logged==false){
            Session::destroy();
            $redirect = URL . 'account/login';
            header('Location: '. $redirect);
            exit;
        }

        $this->view->render('dashboard/index');
    }
}