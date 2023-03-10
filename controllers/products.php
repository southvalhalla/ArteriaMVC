<?php
include_once 'libs/controller.php';

class Products extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('products/index');
    }
}

?>