<?php
include_once 'libs/controller.php';

class Sales extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('sales/index');
    }
}

?>