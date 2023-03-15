<?php 

include_once 'app/config/dataBase.php';

class Model{

    public $db;

    function __construct(){
        $this->db = new dataBase();
    }
}
?>