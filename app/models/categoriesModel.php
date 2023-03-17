<?php
require_once 'app/libs/model.php';
include_once 'app/class/category.php';

class CategoriesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getCategories(){
        $query = $this->db->connect()->query('SELECT * FROM categories');

        return $query;
    }

    public function insertCategory($item){

        try{
            $query = $this->db->connect()->prepare("INSERT INTO categories(category,characteristics) Values(:category, :characteristics)");
            $query->execute([
                'category'          => $item['category'],
                'characteristics'   => $item['characteristics']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    }

    public function getById($id){
        $item = new Category();

        $query = $this->db->connect()->prepare("SELECT * FROM categories WHERE id = :id");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id               = $row['id'];
                $item->category         = $row['category'];
                $item->characteristics  = $row['characteristics'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateCategory($item){
        $query = $this->db->connect()->prepare("UPDATE categories SET category = :category, characteristics = :characteristics WHERE id = :id");

        try{
            $query->execute([
                'id'               => $item['id'],
                'category'         => $item['category'],
                'characteristics'  => $item['characteristics']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteCategory($id) {
        $query = $this->db->connect()->prepare("DELETE FROM categories WHERE id = :id");

        try{
            $query->execute([
                'id'       => $id
            ]);
        }catch(PDOException $e){}
    }
    // public function getCategory(){
    //     $items = [];
    
    //     try {
    //         $query = $this->db->connect()->query("SELECT * FROM categories");
    
    //         while($row = $query-> fetch()){
    //             $item = new category();
    //             $item->id               = $row['id'];
    //             $item->category         = $row['category'];
    //             $item->characteristics  = $row['characteristics'];
    
    //             array_push($items,$item);
    //             return $items;
    //         }
    //     } catch (PDOException $e) {
    //         return [];
    //     }
    // }
}


?>