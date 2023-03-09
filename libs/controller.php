<?php 
require_once 'view.php';

class Controller{

    public $view;
    
    function __construct(){
        $this->view = new View();
    }

    function render($name){
        require 'views/' . $name . '.php';
    }
}
?>