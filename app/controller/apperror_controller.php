<?php
class AppErrorController extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function notfound() {
        $this->view->render('error/notfound');
    }
}