<?php
include_once 'app/libs/controller.php';

class Sales extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $sales = $this->model->getSales();
        $this->view->sales = $sales;

        $this->view->render('sales/index');
    }

    function newSale(){
        $clients = $this->model->getClients_Options();
        $this->view->clients = $clients;
        
        $this->view->render("sales/new-sale");
    }

    // function addProduct(){
    //     $in_inventary  = $_POST['in_inventary']>=0?$_POST['in_inventary']:0;
    //     $name          = $_POST['name'];
    //     $trademark     = $_POST['trademark'];
    //     $category      = $_POST['category'];
    //     $description   = $_POST['description'];
    //     $images        = $_POST['images'];
    //     $price         = $_POST['price'];

    //     if($this->model->insertProduct([
    //         'in_inventary'  => $in_inventary,
    //         'name'          => $name,
    //         'trademark'     => $trademark,
    //         'category'      => $category,
    //         'description'   => $description,
    //         'images'        => $images,
    //         'price'         => $price
    //     ])){
    //         header('Location: ../');
    //         exit();
    //     }else{}
    // }

    // function showProduct($param){
    //     $idProduct = $param[0];
    //     $product = $this->model->getById($idProduct);

    //     $categories = $this->model->getCategories_Options();
    //     $this->view->categories = $categories;

    //     session_start();
    //     $_SESSION['id_showProduct'] = $product->id;
    //     $this->view->productView = $product;
    //     $this->view->render("products/detail");
    // }

    // function editProduct(){
    //     session_start();
    //     $id            = $_SESSION['id_showProduct'];
    //     $in_inventary  = $_POST['in_inventary']>=0?$_POST['in_inventary']:0;
    //     $name          = $_POST['name'];
    //     $trademark     = $_POST['trademark'];
    //     $category      = $_POST['category'];
    //     $description   = $_POST['description'];
    //     $images        = $_POST['images'];
    //     $price         = $_POST['price'];
    //     unset($_SESSION['id_showProduct']);

    //     $this->model->updateProduct([
    //         'id'            => $id,
    //         'in_inventary'  => $in_inventary,
    //         'name'          => $name,
    //         'trademark'     => $trademark,
    //         'category'      => $category,
    //         'description'   => $description,
    //         'images'        => $images,
    //         'price'         => $price
    //     ]);
    //     $product = new Product();
    //     $product->id            = $id;
    //     $product->in_inventary  = $in_inventary;
    //     $product->name          = $name;
    //     $product->tradeMark     = $trademark;
    //     $product->category      = $category;
    //     $product->description   = $description;
    //     $product->images        = $images;
    //     $product->price         = $price;

    //     $this->view->productView = $product;

    //     header('Location: ../products');
    //     exit();
        
    // }

    // function deleteProduct($param){
    //     $id = $param[0];
    //     $this->model->deleteProduct($id);
    // }
}

?>