<?php
include_once 'app/libs/controller.php';

class Clients extends Controller{

    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
        }

    function renderView(){
        if(isset($_REQUEST['num'])){
            $_REQUEST['num'] = $_REQUEST['num']!=''|!empty($_REQUEST['num'])?$_REQUEST['num']:1;
            $page = $_REQUEST['num'];
        }else{
            $page=1;
        }
        $viewRows = 5;
        $begin = is_numeric($page)?(($page-1)*$viewRows):0;

        $content = $this->model->getClients($begin, $viewRows);
        $end = ceil($content[1]/$viewRows);

        $clients = $content[0];
        $this->view->end = $end;
        $this->view->clients = $clients;
        $this->view->page = $page;
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