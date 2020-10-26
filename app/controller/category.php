<?php
class Category extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->view->render('category/index');
    }
}