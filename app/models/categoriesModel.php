<?php
require_once 'src/libs/model.php';
include_once 'src/class/category.php';

class categoriesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getCategories(){
        $query = $this->db->connect()->query('SELECT * FROM categorias');

        return $query;
    }

    public function insertCategory($item){

        try{
            $query = $this->db->connect()->prepare("INSERT INTO categorias(cod,tipo_pro,carac) Values(:cod, :tipo_pro, :carac)");
            $query->execute([
                'cod'       => $item['cod'],
                'tipo_pro'  => $item['tipo_pro'],
                'carac'     => $item['carac']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    }

    public function getCategory(){
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM categorias");

            while($row = $query-> fetch()){
                $item = new category();
                $item->cod = $row['cod'];
                $item->tipo_pro = $row['tipo_pro'];
                $item->carac = $row['carac'];

                array_push($items,$item);
                return $items;
            }
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id){
        $item = new Category();

        $query = $this->db->connect()->prepare("SELECT * FROM categorias WHERE cod = :cod");
        try{
            $query->execute(['cod' => $id]);

            while($row = $query->fetch()){
                $item->cod          = $row['cod'];
                $item->tipo_pro     = $row['tipo_pro'];
                $item->carac        = $row['carac'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateCategory($item){
        $query = $this->db->connect()->prepare("UPDATE categorias SET tipo_pro = :tipo_pro, carac = :carac WHERE cod = :cod");

        try{
            $query->execute([
                'cod'       => $item['cod'],
                'tipo_pro'  => $item['tipo_pro'],
                'carac'     => $item['carac']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteCategory($id) {
        $query = $this->db->connect()->prepare("DELETE FROM categorias WHERE cod = :id");

        try{
            $query->execute([
                'id'       => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}


?>