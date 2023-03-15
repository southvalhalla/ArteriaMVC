<?php
include_once 'app/libs/controller.php';

class Users extends Controller{
    
    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('users/index');
    }
}

?>