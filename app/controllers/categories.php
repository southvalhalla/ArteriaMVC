<?php
include_once 'app/libs/controller.php';

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
        $category           = $_POST['category'];
        $characteristics    = $_POST['characteristics'];

        $this->model->insertCategory([
            'category'          => $category, 
            'characteristics'   => $characteristics
        ]);
        $message = 'categoria creada';
        header("Location: ../");
        exit();
    }

    function showCategory($param) {
        $idCategory = $param[0];
        $category = $this->model->getById($idCategory);

        session_start();
        $_SESSION['id_showCategory'] = $category->id;
        $this->view->categoryView = $category;
        $this->view->render('categories/detail');
    }

    function editCategory() {
        session_start();
        $id                 = $_SESSION['id_showCategory'];
        $category           = $_POST['category'];
        $characteristics    = $_POST['characteristics'];
        unset($_SESSION['id_showCategory']);

        $this->model->updateCategory([
            'id'                => $id, 
            'category'          => $category, 
            'characteristics'   => $characteristics
        ]);

        $category = new Category;
        $category->id               = $id; 
        $category->category         = $category; 
        $category->characteristics  = $characteristics;

        $this->view->categoryView = $category;

        header('Location: ../categories');
        exit();
    }

    function deleteCategory($param) {
        $id = $param[0];
        $this->model->deleteCategory($id);
    }
}

?>