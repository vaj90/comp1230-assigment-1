<?php
class SearchController extends Controller {
    private $data_manager;
    function __construct() {
        parent::__construct();
        $this->data_manager = new DataManager();
    }
    public function index() {
        $model = [];
        $keyword = "";
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $model =$this->data_manager->findItems($keyword);
        }
        $page_number = 1;
        $total_item = count($model);
        $hasExcess = $total_item%3 == 0 ? 0 : 1;
        $page_count = $total_item < 3 ? 1 : round($total_item/3) + $hasExcess;
        if(isset($_GET['page'])){
            $page_number = intVal($_GET['page']);
        }
        $this->view->pagination = [
            'page_number' => $page_number,
            'page_count' => $page_count,
            'total_item' => $total_item
        ];
        $this->view->keyword = $keyword;
        $this->view->model = $model;
        $this->view->render('search/index');
    } 
}