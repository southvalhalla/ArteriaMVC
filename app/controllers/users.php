<?php
include_once 'app/libs/controller.php';

class Users extends Controller{
    
    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $users = $this->model->getUsers();
        $this->view->users = $users;

        $clients = $this->model->getClients_Options();
        $this->view->clients = $clients;

        $employees = $this->model->getEmployees_Options();
        $this->view->employees = $employees;

        $this->view->render('users/index');
    }

    function addUser(){
        $user_info = $_POST['user_info'];
        $userInfo = explode(",", $user_info);
        if($userInfo[0] == 'client'){

            $idClient   = $userInfo[1];
            $client     = $userInfo[2];
            $email      = $userInfo[3];
            $role       = 'Cliente';

        }else if($userInfo[0] == 'employee'){

            $idEmployee     = $userInfo[1];
            $employee       = $userInfo[2];
            $email          = $userInfo[3];
            $role           = $_POST['role'];

        }
        $password = $_POST['password'];
        $password = md5($password);

        if($this->model->insertUser([
            'id_client'     => $idClient,
            'client'        => $client,
            'id_employee'   => $idEmployee,
            'employee'      => $employee,
            'email'         => $email,
            'role'          => $role,
            'password'      => $password
        ])){
            header('Location: ../');
            exit();
        }else{}
    }

    function showUser($param){
        $idUser = $param[0];
        $user = $this->model->getById($idUser);

        $clients = $this->model->getClients_Options();
        $this->view->clients = $clients;

        $employees = $this->model->getEmployees_Options();
        $this->view->employees = $employees;

        session_start();
        $_SESSION['id_showUser'] = $user->id;
        $this->view->userView = $user;
        $this->view->render("users/detail");
    }

    function editUser(){
        session_start();
        $id = $_SESSION['id_showUser'];

        $user_info = $_POST['user_info'];
        $userInfo = explode(",", $user_info);
        if($userInfo[0] == 'client'){

            $idClient   = $userInfo[1];
            $client     = $userInfo[2];
            $email      = $userInfo[3];

        }else if($userInfo[0] == 'employee'){

            $idEmployee     = $userInfo[1];
            $employee       = $userInfo[2];
            $email          = $userInfo[3];

        }

        $role       = $_POST['role'];
        $password   = $_POST['password'];
        $password   = md5($password);
        unset($_SESSION['id_showUser']);

        $this->model->updateUser([
            'id'            => $id,
            'id_client'     => $idClient,
            'client'        => $client,
            'id_employee'   => $idEmployee,
            'employee'      => $employee,
            'email'         => $email,
            'role'          => $role,
            'password'      => $password
        ]);
        $user = new User();
        $user->id           = $id;
        $user->id_client    = $idClient;
        $user->client       = $client;
        $user->id_employee  = $idEmployee;
        $user->employee     = $employee;
        $user->email        = $email;
        $user->role         = $role;
        $user->password     = $password;

        $this->view->userView = $user;

        header('Location: ../users');
        exit();
        
    }

    function deleteUser($param){
        $id = $param[0];
        $this->model->deleteUser($id);
    }
}

?>