<?php 
class View{

    public $message;

    public $categories;
    public $category;

    function __construct(){
    }

    function render($name){
        require "src/views/". $name . ".php";
    }
}
?>