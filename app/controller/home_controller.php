<?php
class HomeController extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function index($param) {
        $this->view->render('home/index');
    }
}