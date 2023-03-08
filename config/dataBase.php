<?php
    class dataBase {
        private $host;
        private $dataBase;
        private $username;
        private $password;

        public function __construct () {
        $this->host = "localhost";
        $this->dataBase = "arteriadb";
        $this->username = "root";
        $this->password = "Pa22w0rd";
        }

        public function connect () {
            try{
                $conn = new PDO ("mysql:host=$this->host;dbname=$this->dataBase",$this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch(PDOException $e){
                echo"error en la conexion: ". $e->getMessage(); 
            }
        }
        
    }
?>