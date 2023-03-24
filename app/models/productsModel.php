<?php
require_once 'app/libs/model.php';
include_once 'app/class/product.php';

class ProductsModel extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function getProducts(){
        $query = $this->db->connect()->query('SELECT * FROM products');

        return $query;
    }

    public function insertProduct($item){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO products(cod,in_inventary,name,trademark,category,description,images,price) Values(:cod,:in_inventary,:name,:trademark,:category,:description,:images,:price)');

            $query->execute([
                'cod'           => 'P'.rand(1000,3456),
                'in_inventary'  => $item['in_inventary'],
                'name'          => $item['name'],
                'trademark'     => $item['trademark'],
                'category'      => $item['category'],
                'description'   => $item['description'],
                'images'        => $item['images'],
                'price'         => $item['price']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getCategories_Options(){
        $query = $this->db->connect()->query('SELECT * FROM categories');

        return $query;
    }

    public function getById($id){
        $item = new Product();

        $query = $this->db->connect()->prepare('SELECT * FROM products WHERE id = :id');

        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id           = $row['id'];
                $item->in_inventary = $row['in_inventary'];
                $item->name         = $row['name'];
                $item->tradeMark    = $row['trademark'];
                $item->category     = $row['category'];
                $item->description  = $row['description'];
                $item->images       = $row['images'];
                $item->price        = $row['price'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateProduct($item) {
        $query = $this->db->connect()->prepare("UPDATE products SET in_inventary = :in_inventary, name = :name, trademark = :trademark, category = :category, description = :description, images = :images, price = :price WHERE id = :id");

        try{
            $query->execute([
                'id'            => $item['id'],
                'in_inventary'  => $item['in_inventary'],
                'name'          => $item['name'],
                'trademark'     => $item['trademark'],
                'category'      => $item['category'],
                'description'   => $item['description'],
                'images'        => $item['images'],
                'price'         => $item['price']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteProduct($id){
        $query = $this->db->connect()->prepare('DELETE FROM products WHERE id = :id');

        try{
            $query->execute([
                'id' => $id
            ]);
            
        }catch(PDOException $e){}
    }


}
?>