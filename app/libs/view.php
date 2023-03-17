<?php 
class View{

    public $message;

    public $categories;
    public $categoryView;

    public $products;
    public $productView;

    function __construct(){
    }

    function render($name){
        require "app/views/". $name . ".php";
    }
}
?>