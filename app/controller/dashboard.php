<?php
class DashBoard extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
        parent::loadModel('account');
    }
    public function index() {
        $am = Session::get("user");
        $account = unserialize($am);
        $this->view->model = $account->username;
        $this->view->render('dashboard/index');
    }
}