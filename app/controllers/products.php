<?php
include_once 'app/libs/controller.php';

class Products extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('products/index');
    }
}

?>