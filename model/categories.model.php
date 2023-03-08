<?php
    require_once '../config/dataBase.php';

    class categoriesModel extends dataBase {

        public function getCategories() {
            $query = $this->connect()->query("SELECT * FROM categorias");
            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
    }
?>