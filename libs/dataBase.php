<?php
    class dataBase {
        private $host;
        private $dataBase;
        private $username;
        private $password;

        public function __construct () {
        $this->host = constant('HOST');
        $this->dataBase = constant('DATABASE');
        $this->username = constant('USER');
        $this->password = constant('PASSWORD');
        }

        public function connect () {
            try{
                $conn = new PDO ("mysql:host=$this->host;dbname=$this->dataBase",$this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch(PDOException $e){
                print_r("error en la conexion: ". $e->getMessage()); 
            }
        }
        
    }
?>