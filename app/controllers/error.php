<?php
include_once 'app/libs/controller.php';

class Errorr extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('error/index');
        // echo "<p>Error al cargar el recurso</p>";
    }
}

?>