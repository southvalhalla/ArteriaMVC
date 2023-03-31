<?php
require_once 'app/libs/model.php';
include_once 'app/class/client.php';

class ClientsModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getClients($param1,$param2){
        // $query = $this->db->connect()->query('SELECT * FROM clients');
        $query = $this->db->connect()->prepare('SELECT * FROM clients ORDER BY id ASC LIMIT :param1, :param2');
        $rows = $this->db->connect()->query('SELECT * FROM clients')->rowCount();
        $query->bindValue(':param1', $param1, PDO::PARAM_INT);
        $query->bindValue(':param2', $param2, PDO::PARAM_INT);

        try{
            $query->execute();
            return [$query,$rows];
        }catch(PDOException $e){}
    }

    public function insertClient($item){

        try{
            $query = $this->db->connect()->prepare("INSERT INTO clients(document_type, document_number, names, lastnames, phone, email, address, city) Values(:document_type, :document_number, :names, :lastnames, :phone, :email, :address, :city)");
            $query->execute([
                'document_type'     => $item['document_type'],
                'document_number'   => $item['document_number'],
                'names'             => $item['names'],
                'lastnames'         => $item['lastnames'],
                'phone'             => $item['phone'],
                'email'             => $item['email'],
                'address'           => $item['address'],
                'city'              => $item['city'],
            ]);
        }catch(PDOException $e){}
        
    }

    public function getById($id){
        $item = new Client();

        $query = $this->db->connect()->prepare("SELECT * FROM clients WHERE id = :id");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id               = $row['id'];
                $item->document_type    = $row['document_type'];
                $item->document_number  = $row['document_number'];
                $item->names            = $row['names'];
                $item->lastnames        = $row['lastnames'];
                $item->phone            = $row['phone'];
                $item->email            = $row['email'];
                $item->address          = $row['address'];
                $item->city             = $row['city'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateClient($item){
        $query = $this->db->connect()->prepare("UPDATE clients SET document_type = :document_type, document_number = :document_number, names = :names, lastnames = :lastnames, phone = :phone, email = :email, address = :address, city = :city WHERE id = :id");

        try{
            $query->execute([
                'id'                => $item['id'],
                'document_type'     => $item['document_type'],
                'document_number'   => $item['document_number'],
                'names'             => $item['names'],
                'lastnames'         => $item['lastnames'],
                'phone'             => $item['phone'],
                'email'             => $item['email'],
                'address'           => $item['address'],
                'city'              => $item['city']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteClient($id) {
        $query = $this->db->connect()->prepare("DELETE FROM clients WHERE id = :id");

        try{
            $query->execute([
                'id'       => $id
            ]);
        }catch(PDOException $e){}
    }
}


?>