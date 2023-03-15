<?php 
class View{

    public $message;

    public $categories;
    public $categoryView;

    function __construct(){
    }

    function render($name){
        require "app/views/". $name . ".php";
    }
}
?>