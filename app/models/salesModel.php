<?php
require_once 'app/libs/model.php';
include_once 'app/class/user.php';

class SalesModel extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function getSales(){
        $query = $this->db->connect()->query('SELECT * FROM sales ORDER BY id ASC');

        return $query;
    }

    public function getClients_Options(){
        $query = $this->db->connect()->query('SELECT * FROM clients');

        return $query;
    }

    public function getProducts_options(){
        $query = $this->db->connect()->query('SELECT * FROM products');

        return $query;
    }

    public function getSaleByID($id,$id_client){
        $querySale = $this->db->connect()->prepare('SELECT * FROM sales WHERE id = :id');
        $queryClient = $this->db->connect()->prepare('SELECT * FROM clients WHERE id = :id');
    
        try{
            $querySale->execute([
                'id' => $id
            ]);
            $queryClient->execute([
                'id' => $id_client
            ]);

            $query = [$querySale,$queryClient];
            return $query;
        } catch(PDOException $e){}
    }

    function viewInfo($id){
        $query = $this->db->connect()->prepare('SELECT pay_info, products FROM sales WHERE id = :id');
    
        try{
            $query->execute([
                'id' => $id
            ]);
            return $query;
        } catch(PDOException $e){
        }

    }

    public function insertSale($item){
        $query = $this->db->connect()->prepare('INSERT INTO sales(cod, date, id_client, status, pay_info, products, total) Values( :cod, :date, :id_client, :status, :pay_info, :products, :total)');
        try{
            $query->execute([
                'cod'       => $item['cod'],
                'date'      => $item['date'],
                'id_client' => $item['id_client'],
                'status'    => $item['status'],
                'products'  => $item['products'],
                'pay_info'  => $item['pay_info'],
                'total'     => $item['total']
            ]);
            return true;
        }catch(PDOException $e){
            print_r($item);
            return false;
        }
    }

    public function getById($id){

        $query = $this->db->connect()->prepare('SELECT status FROM sales WHERE id = :id');
    
        try{
            $query->execute([
                'id' => $id
            ]);

            return $query;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateStatus($item) {
        $query = $this->db->connect()->prepare("UPDATE sales SET status = :status WHERE id = :id");

        try{
            $query->execute([
                'id'        => $item['id'],
                'status'    => $item['status']
            ]);
            var_dump($item['id']);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteSale($id){
        $query = $this->db->connect()->prepare("DELETE FROM sales WHERE id = :id");

        try{
            $query->execute([
                'id' => $id
            ]);
            
        }catch(PDOException $e){}
    }


}
?>