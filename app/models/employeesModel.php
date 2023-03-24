<?php
require_once 'app/libs/model.php';
include_once 'app/class/employee.php';

class EmployeesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getEmployees(){
        $query = $this->db->connect()->query('SELECT * FROM employees');

        return $query;
    }

    public function insertEmployee($item){

        try{
            $query = $this->db->connect()->prepare("INSERT INTO employees(document_type, document_number, names, lastnames, phone, email, job) Values(:document_type, :document_number, :names, :lastnames, :phone, :email, :job)");
            $query->execute([
                'document_type'     => $item['document_type'],
                'document_number'   => $item['document_number'],
                'names'             => $item['names'],
                'lastnames'         => $item['lastnames'],
                'phone'             => $item['phone'],
                'email'             => $item['email'],
                'job'               => $item['job'],
            ]);
        }catch(PDOException $e){}
        
    }

    public function getById($id){
        $item = new Employee();

        $query = $this->db->connect()->prepare("SELECT * FROM employees WHERE id = :id ORDER BY id asc");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id                   = $row['id'];
                $item->document_type        = $row['document_type'];
                $item->document_number      = $row['document_number'];
                $item->names                = $row['names'];
                $item->lastnames            = $row['lastnames'];
                $item->phone                = $row['phone'];
                $item->email                = $row['email'];
                $item->job                  = $row['job'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateEmployee($item){
        $query = $this->db->connect()->prepare("UPDATE employees SET document_type = :document_type, document_number = :document_number, names = :names, lastnames = :lastnames, phone = :phone, email = :email, job = :job WHERE id = :id");

        try{
            $query->execute([
                'id'                => $item['id'],
                'document_type'     => $item['document_type'],
                'document_number'   => $item['document_number'],
                'names'             => $item['names'],
                'lastnames'         => $item['lastnames'],
                'phone'             => $item['phone'],
                'email'             => $item['email'],
                'job'               => $item['job']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteEmployee($id) {
        $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id = :id");

        try{
            $query->execute([
                'id' => $id
            ]);
        }catch(PDOException $e){}
    }
}


?>