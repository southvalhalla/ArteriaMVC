<?php
include_once 'src/libs/controller.php';

class Categories extends Controller{

    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
        }

    function renderView(){
        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        $this->view->render('categories/index');
    }

    function createCategory() {
        $cod        = $_POST['txtcod'];
        $tipo_pro   = $_POST['txttipo_pro'];
        $carac      = $_POST['txtcarac'];

        $message = "";

        if ($this->model->insertCategory([
            'cod'       => $cod, 
            'tipo_pro'  => $tipo_pro, 
            'carac'     => $carac
        ])) {
            $message = 'categoria creada';
        } else {
            $message = 'la categoria ya existe';
        }

        $this->view->message = $message;
        $this->renderView();
        
    }

    function showCategory($param = null) {
        $idCategory = $param[0];
        $category = $this->model->getById($idCategory);

        session_start();
        $_SESSION['id_showCategory'] = $category->cod;
        $this->view->category = $category;
        $this->view->render('categories/detail');
    }

    function editCategory() {
        session_start();
        $cod        = $_SESSION['id_showCategory'];
        $tipo_pro   = $_POST['txttipo_pro'];
        $carac      = $_POST['txtcarac'];

        unset($_SESSION['id_showCategory']);

        if ($this->model->updateCategory([
            'cod'       => $cod, 
            'tipo_pro'  => $tipo_pro, 
            'carac'     => $carac
        ])) {

            $category = new Category;
            $category->cod       = $cod; 
            $category->tipo_pro  = $tipo_pro; 
            $category->carac     = $carac;

            $this->view->category = $category;
            $this->view->message = 'categoria creada';
        } else {
            $this->view->message = 'la categoria ya existe';
        }
        $this->view->render('categories/detail');
    }

    function deleteCategory($param = null) {
        $cod = $param[0];

        if ($this->model->deleteCategory($cod)){
            $message = 'categoria eliminada';
        } else {
            $message = 'categoria no fue eliminada';
        }

        echo "se elimino la vista " . $cod;
    }
}

?>