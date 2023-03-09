<?php

    include_once 'apis/apiCategories.php';

    $api = new ApiCategories();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getByID($id);
        }else{
            $api->error('Los parametros son incorrectos');
        }
    } else {
        $api->getAll();
    }

?>