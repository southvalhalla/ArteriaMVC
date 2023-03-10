<?php
require_once 'libs/model.php';

class categoriesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    function getCategories(){
        $query = $this->db->connect()->query('SELECT * FROM categorias');

        return $query;
    }

    public function insertCategory($datos){

        try{
            $query = $this->db->connect()->prepare("INSERT INTO categorias(cod,tipo_pro,carac) Values(:cod, :tipo_pro, :carac)");
            $query->execute([
                'cod' => $datos['cod'],
                'tipo_pro' => $datos['tipo_pro'],
                'carac' => $datos['carac']
            ]);
        }catch(PDOException $e){
            // print_r($e->getMessage());
            echo 'ID ya existe';
        }
        
    }

    function getCategory($id){
        $query = $this->db->connect()->prepare('SELECT * FROM categorias WHERE cod = :cod');
        $query->execute(['cod' => $id]);

        return $query;
    }
}


?>