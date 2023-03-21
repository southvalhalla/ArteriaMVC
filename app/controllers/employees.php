<?php
include_once 'app/libs/controller.php';

class Employees extends Controller{

    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
        }

    function renderView(){
        $employees = $this->model->getEmployees();
        $this->view->employees = $employees;
        $this->view->render('employees/index'); 
    }

    function addEmployee() {
        $document_type      = $_POST['document_type'];
        $document_number    = $_POST['document_number'];
        $names              = $_POST['names'];
        $lastnames          = $_POST['lastnames'];
        $phone              = $_POST['phone'];
        $email              = $_POST['email'];
        $job                = $_POST['job'];

        $this->model->insertEmployee([
            'document_type'     => $document_type, 
            'document_number'   => $document_number, 
            'names'             => $names, 
            'lastnames'         => $lastnames, 
            'phone'             => $phone, 
            'email'             => $email, 
            'job'               => $job
        ]);
        header("Location: ../");
        exit();
    }

    function showEmployee($param) {
        $idEmployee = $param[0];
        $employee = $this->model->getById($idEmployee);

        session_start();
        $_SESSION['id_showEmployee'] = $employee->id;
        $this->view->employeeView = $employee;
        $this->view->render('employees/detail');
    }

    function editEmployee() {
        session_start();
        $id                 = $_SESSION['id_showEmployee'];
        $document_type      = $_POST['document_type'];
        $document_number    = $_POST['document_number'];
        $names              = $_POST['names'];
        $lastnames          = $_POST['lastnames'];
        $phone              = $_POST['phone'];
        $email              = $_POST['email'];
        $job                = $_POST['job'];
        unset($_SESSION['id_showEmployee']);

        $this->model->updateEmployee([
            'id'                => $id,
            'document_type'     => $document_type, 
            'document_number'   => $document_number, 
            'names'             => $names, 
            'lastnames'         => $lastnames, 
            'phone'             => $phone, 
            'email'             => $email, 
            'job'               => $job
        ]);

        $employee = new Employee();
        $employee->id               = $id; 
        $employee->document_type    = $document_type; 
        $employee->document_number  = $document_number; 
        $employee->names            = $names; 
        $employee->lastnames        = $lastnames; 
        $employee->phone            = $phone; 
        $employee->email            = $email; 
        $employee->job              = $job;
        
        $this->view->employeeView = $employee;

        header('Location: ../employees');
        exit();
    }

    function deleteEmployee($param) {
        $id = $param[0];
        $this->model->deleteEmployee($id);
    }
}

?>