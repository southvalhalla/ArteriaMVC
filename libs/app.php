<?php
require_once 'controllers/error.php';

class App{

    function __construct(){

        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // var_dump($url);
        $fileController = 'controllers/' . $url[0] . '.php';

        if(file_exists($fileController)){
            require_once $fileController;
            $controller = new $url[0];

            if(isset($url[1])){
                $controller->{$url[1]}();
            }else{}
        }else{
            $controller = new Errorr();
        }
    }
}

?>