<?php
include_once 'libs/controller.php';

class Categories extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $this->view->render('categories/index');
    }

    function createCategory() {
        $cod = $_POST['txtcod'];
        $tipo_pro = $_POST['txttipo_pro'];
        $carac = $_POST['txtcarac'];

        $message = "";

        $this->model->insertCategory(['cod' => $cod, 'tipo_pro' => $tipo_pro, 'carac' => $carac]);
        echo 'categoria creada';
    }

    // public function showCategories() {
    //     $categoriesModel = new categoriesModel();
    //     $categories = $categoriesModel->getCategories();
    //     require 'views/categories/index.php';
        
    // }
}

?>