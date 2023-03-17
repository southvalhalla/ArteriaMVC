<?php
include_once 'app/libs/controller.php';

class Products extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $products = $this->model->getProducts();
        $this->view->products = $products;

        $categories = $this->model->getCategories_Options();
        $this->view->categories = $categories;

        $this->view->render('products/index');
    }

    function addProduct(){
        $name          = $_POST['name'];
        $trademark     = $_POST['trademark'];
        $category      = $_POST['category'];
        $description   = $_POST['description'];
        $images        = $_POST['images'];
        $price         = $_POST['price'];

        if($this->model->insertProduct([
            'name'          => $name,
            'trademark'     => $trademark,
            'category'      => $category,
            'description'   => $description,
            'images'        => $images,
            'price'         => $price
        ])){
            header('Location: ../');
            exit();
        }else{}
    }

    function showProduct($param){
        $idProduct = $param[0];
        $product = $this->model->getById($idProduct);

        $categories = $this->model->getCategories_Options();
        $this->view->categories = $categories;

        session_start();
        $_SESSION['id_showProduct'] = $product->id;
        $this->view->productView = $product;
        $this->view->render("products/detail");
    }

    function editProduct(){
        session_start();
        $id             =   $_SESSION['id_showProduct'];
        $name          = $_POST['name'];
        $trademark     = $_POST['trademark'];
        $category      = $_POST['category'];
        $description   = $_POST['description'];
        $images        = $_POST['images'];
        $price         = $_POST['price'];
        unset($_SESSION['id_showProduct']);

        $this->model->updateProduct([
            'id'            => $id,
            'name'          => $name,
            'trademark'     => $trademark,
            'category'      => $category,
            'description'   => $description,
            'images'        => $images,
            'price'         => $price
        ]);
        $product = new Product();
        $product->id            = $id;
        $product->name          = $name;
        $product->tradeMark     = $trademark;
        $product->category      = $category;
        $product->description   = $description;
        $product->images        = $images;
        $product->price         = $price;

        $this->view->productView = $product;

        header('Location: ../products');
        exit();
        
    }

    function deleteProduct($param){
        $id = $param[0];
        $this->model->deleteProduct($id);
    }
}

?>