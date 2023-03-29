<?php 
class View{

    public $message;

    public $categories;
    public $categoryView;

    public $products;
    public $productView;

    public $employees;
    public $employeeView;

    public $clients;
    public $clientView;

    public $users;
    public $userView;

    public $sales;
    public $saleView;
    public $saleInfoProds;
    public $saleInfoPay;

    function __construct(){
    }

    function render($name){
        require "app/views/". $name . ".php";
    }
}
?>