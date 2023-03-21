<?php
include_once 'app/libs/controller.php';

class Clients extends Controller{

    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
        }

    function renderView(){
        $clients = $this->model->getClients();
        $this->view->clients = $clients;
        $this->view->render('clients/index'); 
    }

    function addClient() {
        $document_type      = $_POST['document_type'];
        $document_number    = $_POST['document_number'];
        $names              = $_POST['names'];
        $lastnames          = $_POST['lastnames'];
        $phone              = $_POST['phone'];
        $email              = $_POST['email'];
        $address            = $_POST['address'];
        $city               = $_POST['city'];
        

        $this->model->insertClient([
            'document_type'     => $document_type, 
            'document_number'   => $document_number, 
            'names'             => $names, 
            'lastnames'         => $lastnames, 
            'phone'             => $phone, 
            'email'             => $email, 
            'address'           => $address,
            'city'              => $city,
        ]);
        header("Location: ../");
        exit();
    }

    function showClient($param) {
        $idClient = $param[0];
        $client = $this->model->getById($idClient);

        session_start();
        $_SESSION['id_showClient'] = $client->id;
        $this->view->clientView = $client;
        $this->view->render('clients/detail');
    }

    function editClient() {
        session_start();
        $id                 = $_SESSION['id_showClient'];
        $document_type      = $_POST['document_type'];
        $document_number    = $_POST['document_number'];
        $names              = $_POST['names'];
        $lastnames          = $_POST['lastnames'];
        $phone              = $_POST['phone'];
        $email              = $_POST['email'];
        $address            = $_POST['address'];
        $city               = $_POST['city'];
        unset($_SESSION['id_showClient']);

        $this->model->updateClient([
            'id'                => $id,
            'document_type'     => $document_type, 
            'document_number'   => $document_number, 
            'names'             => $names, 
            'lastnames'         => $lastnames, 
            'phone'             => $phone, 
            'email'             => $email, 
            'address'           => $address,
            'city'              => $city,
        ]);

        $client = new Client();
        $client->id               = $id; 
        $client->document_type    = $document_type; 
        $client->document_number  = $document_number; 
        $client->names            = $names; 
        $client->lastnames        = $lastnames; 
        $client->phone            = $phone; 
        $client->email            = $email; 
        $client->address          = $address;
        $client->city             = $city;
        
        $this->view->clientView = $client;

        header('Location: ../clients');
        exit();
    }

    function deleteClient($param) {
        $id = $param[0];
        $this->model->deleteClient($id);
    }
}

?>