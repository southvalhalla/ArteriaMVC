<?php
require_once 'app/libs/model.php';
include_once 'app/class/employee.php';

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function userPass($email,$password){
        $query = $this->db->connect()->prepare('SELECT password=:password FROM users WHERE email=:email');

        try{
            $query->execute([
                'email' => $email,
                'password' => $password
            ]);
            return $query->fetchObject();
        }catch(PDOException $e){}
    } 
}

?>