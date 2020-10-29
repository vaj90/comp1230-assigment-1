<?php
class ItemController extends Controller {
    private $filehelper;
    private $data_manager;
    function __construct() {
        parent::__construct();
        parent::loadModel('item');
        $this->filehelper = new FileHelper("item");
        $this->data_manager = new DataManager();
    }
    public function index() {
        $this->view->render('item/index');
    }
    public function list(){
        $this->isAuthenticated();
        $model = $this->data_manager->getAllItems();
        $this->view->model= $model;
        $this->view->data_manager = $this->data_manager;
        $this->view->render('item/list');
    }
    public function add(){
        $this->isAuthenticated();
        $model = [
            'id' => 0,
            'title' => '',
            'description' => '',
            'price' => '',
            'picture' => '',
            'item-category-id'
        ];
        $this->view->title= "Add new item";
        $this->view->task= "add";
        $this->view->model= $model;
        $this->view->data_manager = $this->data_manager;
        $this->view->render('item/addedit');
    }
    public function edit($id){
        $this->isAuthenticated();
        $model = $this->data_manager->getItemById($id);
        $model = [
            'id' => $model[0],
            'title' => $model[1],
            'description' => $model[2],
            'price' => $model[3],
            'picture' => $model[4],
            'item-category-id' => $model[5]
        ];
        $this->view->title= "Modify category";
        $this->view->task= "edit";
        $this->view->model= $model;
        $this->view->data_manager = $this->data_manager;
        $this->view->render('item/addedit');
    }
    public function delete($id){
        $this->isAuthenticated();
        $deleteItem = $this->data_manager->deleteItem($id);
        if($deleteItem){
            header('Location: '  . URL . 'item/list');
            exit;
        }
        $result = [];
        $this->view->link = "/item/list";
        $this->view->title = "Error in deleting item";
        $this->view->model = $result['Message'];
        $this->view->render('shared/output');
    }
    public function savesubmit(){
        global $config;
        global $root_dir;
        $upload_dir = $config['IMAGES_PATH'];
        $errors = []; 
        $file_ext_allowed = ['jpeg','jpg','png']; 

        $this->isAuthenticated();

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = intval($_POST['price']);
        $itemcategoryid = intval($_POST['item-category-id']);
        $id = $id==0 ?$this->filehelper->getId() : $id;
        $task = $_POST['task'];

        $file_name = $_FILES['picture']['name'];
        $file_size = $_FILES['picture']['size'];
        $file_temporary_name  = $_FILES['picture']['tmp_name'];
        $file_type = $_FILES['picture']['type'];
        $file_error = $_FILES['picture']['error'];
        $file_ext = strtolower(end(explode('.',$file_name)));
    
        if (!in_array($file_ext, $file_ext_allowed)) {
            $errors[] = "This file extension is not allowed. Please upload " . implode(" ",$file_ext_allowed) . " file";
        }
        if ($file_size > 2000000) {
            $errors[] = "File exceeds maximum size (2MB)";
        }
        if (empty($errors)) {
            if($file_error>0){
                echo "There is an error with the file.";
            }
            else{
                $file_new_name = uniqid('',true). "."."$file_ext";
                $file_destination = $upload_dir . $file_new_name;
                $picture = $file_destination;
                
                $file_destination =  $root_dir . $file_destination;
                echo $file_destination;
                if($task=="add"){
                    $result = $this->data_manager->addItem($id,$title,$description,$price,$picture,$itemcategoryid);
                }
                else{
                    $result = $this->data_manager->updateItem($id,$title,$description,$price,$picture,$itemcategoryid);
                }
                print_r($result);
                $is_uploaded = move_uploaded_file($file_temporary_name, $file_destination);
                if (!$is_uploaded) {
                    $result['IsSuccess'] = false;
                    $result['Message'][] = "An error occurred. Please contact the administrator.";
                }
                if($result['IsSuccess']){
                    header('Location: '  . URL . 'item/list');
                    exit;
                }
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "\n";
            }
        }
        $this->view->link = $task == "add" ? "/item/add" : "/item/edit/" . $id;
        $this->view->title = "Error in " . ($task == "add" ? "creating" : "modifying") . " item";
        $this->view->model = $result['Message'];
        $this->view->render('shared/output');
    }
}