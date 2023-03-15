<?php 

include_once 'src/config/dataBase.php';

class Model{

    public $db;

    function __construct(){
        $this->db = new dataBase();
    }
}
?>