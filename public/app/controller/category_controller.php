<?php
class CategoryController extends Controller {
    private $filehelper;
    private $data_manager;
    function __construct() {
        parent::__construct();
        parent::loadModel('category');
        $this->filehelper = new FileHelper("category");
        $this->data_manager = new DataManager();
    }
    public function index() {
        $this->view->render('category/index');
    }
    public function list(){
        $this->isAuthenticated();
        $model = $this->data_manager->getAllCategories();
        $this->view->model= $model;
        $this->view->data_manager = $this->data_manager;
        $this->view->render('category/list');
    }
    public function add(){
        $this->isAuthenticated();
        $model = [
            'id' => 0,
            'title' => '',
            'description' => ''
        ];
        $this->view->title= "Add new category";
        $this->view->task= "add";
        $this->view->model= $model;
        $this->view->render('category/addedit');
    }
    public function edit($id){
        $this->isAuthenticated();
        $model = $this->data_manager->getCategoryById($id);
        $model = [
            'id' => $model[0],
            'title' => $model[1],
            'description' => $model[2]
        ];
        $this->view->title= "Modify category";
        $this->view->task= "edit";
        $this->view->model= $model;
        $this->view->render('category/addedit');
    }
    public function delete($id){
        $this->isAuthenticated();
        $deleteItemByCategoryId = $this->data_manager->deleteAllItemsByCategoryId($id);
        if($deleteItemByCategoryId){
            $deleteCategory = $this->data_manager->deleteCategory($id);
            if($deleteCategory){
                header('Location: '  . URL . 'category/list');
                exit;
            }
        }
        $result = [];
        $this->view->link = "/category/list";
        $this->view->title = "Error in deleting category";
        $this->view->model = $result['Message'];
        $this->view->render('shared/output');
    }
    public function savesubmit(){
        $this->isAuthenticated();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $task = $_POST['task'];
        $id = $id==0 ?$this->filehelper->getId() : $id;
        if($task=="add"){
            $result = $this->data_manager->addCategory($id,$title,$description);
        }
        else{
            $result = $this->data_manager->updateCategory($id,$title,$description);
        }
        
        if($result['IsSuccess']){
            header('Location: '  . URL . 'category/list');
            exit;
        }
        $this->view->link = $task == "add" ? "/category/add" : "/category/edit/" . $id;
        $this->view->title = "Error in " . ($task == "add" ? "creating" : "modifying") . " category";
        $this->view->model = $result['Message'];
        $this->view->render('shared/output');
    }
}