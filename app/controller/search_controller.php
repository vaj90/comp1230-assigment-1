<?php
class SearchController extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
    }
    public function index() {
        $this->view->render('search/index');
    } 
}