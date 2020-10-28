<?php
class ItemController extends Controller {
    private $filehelper;
    private $data_manager;
    function __construct() {
        parent::__construct();
        parent::loadModel('item');
        Session::init();
        $this->filehelper = new FileHelper("item");
    }
    public function index() {
        $this->view->render('category/index');
    }
    public function list(){

    }
    public function add(){
        
    }
    public function delete(){
        
    }
    public function info(){
        
    }
}