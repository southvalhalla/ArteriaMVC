<?php
include_once 'libs/controller.php';

class Users extends Controller{
    
    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('users/index');
    }
}

?>