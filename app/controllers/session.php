<?php
include_once 'app/libs/controller.php';

class Sessions_ extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
    }

    function setCurrentUser($email){
        $_SESSION['user'] = $email;
    }

    function getCurrentUser(){
        return $_SESSION['user'];
    }

    function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>