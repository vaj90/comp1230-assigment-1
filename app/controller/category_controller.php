<?php
class CategoryController extends Controller {
    private $filehelper;
    private $data_manager;
    function __construct() {
        parent::__construct();
        parent::loadModel('category');
        Session::init();
        $this->filehelper = new FileHelper("category");
    }
    public function index() {
        $this->view->render('category/index');
    }
    public function list(){

    }
    public function add(){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    public function delete(){
        
    }
    public function info(){
        
    }
}