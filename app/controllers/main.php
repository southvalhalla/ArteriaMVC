<?php
include_once 'app/libs/controller.php';

class Main extends Controller{

    function __construct(){
        parent::__construct();
        // echo "<p>Nuevo controlador main</p>";
    }

    function renderView(){
        $this->view->render('main/index');
    }
}

?>