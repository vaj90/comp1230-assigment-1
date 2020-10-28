<?php
class CategoryController extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->view->render('category/index');
    }
}