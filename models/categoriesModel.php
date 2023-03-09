<?php
    require_once './config/dataBase.php';

    class categoriesModel extends dataBase{

        function getCategories(){
            $query = $this->connect()->query('SELECT * FROM categorias');

            return $query;
        }

        function getCategory($id){
            $query = $this->connect()->prepare('SELECT * FROM categorias WHERE cod = :cod');
            $query->execute(['cod' => $id]);

            return $query;
        }
    }
?>