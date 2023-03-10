<?php 
require_once 'view.php';

class Controller{

    protected $view;
    protected $model;    
    
    function __construct(){
        $this->view = new View();
    }

    function render($name){
        require 'views/' . $name . '.php';
    }

    function loadModel($model){
        $url = 'models/' . $model . 'Model.php';

        if (file_exists(($url))) {
            require $url;

            
            $modelName = $model.'Model';
            $this->model = new $modelName;
        }
    }
}
?>