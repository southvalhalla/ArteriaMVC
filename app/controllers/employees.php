<?php
include_once 'app/libs/controller.php';
// require_once 'vendor/autoload.php';

class Employees extends Controller{

    
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

        $content = $this->model->getEmployees($begin, $viewRows);
        $end = ceil($content[1]/$viewRows);

        $employees = $content[0];
        $this->view->end = $end;
        $this->view->page = $page;
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

    function generatePDF() {
        $pdf = new FPDF('L'); // se crea una instancia de la clase FPDF con orientación horizontal
        $pdf->AddPage(); // se agrega una página al archivo PDF

        $pdf->SetFont('Arial', 'B', 10); // se establece la fuente para el título de la tabla
        $pdf->SetFillColor(200, 200, 200); // se establece el color de fondo para las celdas de la tabla

        $employees = $this->model->getEmployees();

        $results = $employees->fetchAll(PDO::FETCH_ASSOC); // se obtienen los resultados de la consulta en forma de un arreglo asociativo

        $columnNames = array_keys($results[0]); // se obtienen los nombres de las columnas de la tabla a partir de los resultados

        foreach ($columnNames as $columnName) { // se recorre cada columna y se agrega su nombre a la tabla
            if($columnName == 'id'){
                $pdf->Cell(10, 6, $columnName, 1, 0, 'C', true);
            }else if($columnName == 'email'){
                $pdf->Cell(65, 6, $columnName, 1, 0, 'C', true);
            }else if($columnName == 'phone'){
                $pdf->Cell(25, 6, $columnName, 1, 0, 'C', true);
            }else{
                $pdf->Cell(35, 6, $columnName, 1, 0, 'C', true);
            } 
        }
        $pdf->Ln(); // se agrega una nueva línea después de agregar los nombres de las columnas

        $pdf->SetFont('Arial', '', 10); // se establece la fuente para el contenido de la tabla

        foreach ($results as $row) { // se recorre cada fila de la tabla y se agregan sus valores a la tabla
            foreach ($columnNames as $columnName) { // se recorre cada columna de la fila y se agrega su valor a la tabla
                if($columnName == 'id'){
                    $pdf->Cell(10, 7, $row[$columnName], 1, 0, 'C');
                }else if($columnName == 'email'){
                    $pdf->Cell(65, 7, $row[$columnName], 1, 0, 'C');
                }else if($columnName == 'phone'){
                    $pdf->Cell(25, 7, $row[$columnName], 1, 0, 'C');
                }else{
                    $pdf->Cell(35, 7, $row[$columnName], 1, 0, 'C');
                }                
            }
            $pdf->Ln(); // se agrega una nueva línea después de agregar los valores de la fila
        }

        $pdf->Output(); // se envía el archivo PDF al navegador o se guarda en el servidor
    }
}

?>