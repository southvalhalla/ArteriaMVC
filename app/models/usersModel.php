<?php
require_once 'app/libs/model.php';
include_once 'app/class/user.php';

class UsersModel extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function getUsers(){
        $query = $this->db->connect()->query('SELECT * FROM users ORDER BY id ASC');

        return $query;
    }

    public function insertUser($item){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO users(id_employee,employee,id_client,client,email,role,password) Values(:id_employee,:employee,:id_client,:client,:email,:role,:password)');

            $query->execute([
                'id_employee'   => $item['id_employee'],
                'employee'      => $item['employee'],
                'id_client'     => $item['id_client'],
                'client'        => $item['client'],
                'email'         => $item['email'],
                'role'          => $item['role'],
                'password'      => $item['password']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getClients_Options(){
        $query = $this->db->connect()->query('SELECT * FROM clients');

        return $query;
    }

    public function getEmployees_Options(){
        $query = $this->db->connect()->query('SELECT * FROM employees');

        return $query;
    }

    public function getById($id){
        $item = new User();

        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE id = :id');

        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id           = $row['id'];
                $item->id_employee  = $row['id_employee'];
                $item->employee     = $row['employee'];
                $item->id_client    = $row['id_client'];
                $item->client       = $row['client'];
                $item->email        = $row['email'];
                $item->role         = $row['role'];
                $item->password     = $row['password'];

            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateUser($item) {
        $query = $this->db->connect()->prepare("UPDATE users SET id_employee = :id_employee, employee = :employee, id_client = :id_client, client = :client, email = :email, role = :role, password = :password WHERE id = :id");

        try{
            $query->execute([
                'id'            => $item['id'],
                'id_employee'   => $item['id_employee'],
                'employee'      => $item['employee'],
                'id_client'     => $item['id_client'],
                'client'        => $item['client'],
                'email'         => $item['email'],
                'role'          => $item['role'],
                'password'      => $item['password']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteUser($id){
        $query = $this->db->connect()->prepare("DELETE FROM users WHERE id = :id");

        try{
            $query->execute([
                'id' => $id
            ]);
            
        }catch(PDOException $e){}
    }


}
?>