<?php
    class dataBase {
        private $host;
        private $dataBase;
        private $username;
        private $password;
        private $charset;

        public function __construct () {
        $this->host     = constant('HOST');
        $this->dataBase = constant('DATABASE');
        $this->username = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
        }

        public function connect () {
            try{
                $conn = new PDO ("mysql:host=$this->host;dbname=$this->dataBase;charset=$this->charset",$this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch(PDOException $e){
                print_r("error en la conexion: ". $e->getMessage()); 
            }
        }
        
    }
?>