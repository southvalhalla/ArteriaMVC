<?php
    require_once '../model/categories.model.php';

    class categoriesController extends categoriesModel {

        public function getCategories() {
            $categories = $this->getCategories();
            require '../View/categories.php';
        }
    }

    $categories = new categoriesModel;
    $categories->getCategories();
?>