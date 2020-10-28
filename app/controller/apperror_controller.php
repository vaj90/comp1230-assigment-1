<?php
class AppErrorController extends Controller {
    function __construct() {
        parent::__construct();
        echo "this is apperror<br>";
    }
    public function notfound() {
        $this->view->render('error/notfound');
    }
}