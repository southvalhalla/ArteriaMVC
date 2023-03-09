<?php
include_once 'libs/controller.php';

class ProductsController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('products/index');
    }
}

?>