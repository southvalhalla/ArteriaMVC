<?php 

include_once 'dataBase.php';

class Model{

    public $db;

    function __construct(){
        $this->db = new dataBase();
    }
}
?>