<?php
include_once 'app/libs/controller.php';

class Sales extends Controller{

    function __construct(){
        parent::__construct();
    }

    function renderView(){
        $sales = $this->model->getSales();
        $this->view->sales = $sales;

        $this->view->render('sales/index');
    }

    function newSale(){
        $clients = $this->model->getClients_Options();
        $this->view->clients = $clients;

        $products = $this->model->getProducts_options();
        $this->view->products = $products;

        $this->view->render("sales/new-sale");
    }

    function changeMethod(){
        if (isset($_POST['required'])) {
            $required = filter_var($_POST['required'], FILTER_VALIDATE_BOOLEAN);
        }
        if (isset($_POST['disabled'])) {
            $required = filter_var($_POST['disabled'], FILTER_VALIDATE_BOOLEAN);
        }
        
    }
    
    function viewInfo($param){
        $id = $param[0];
        $id_client = $param[1];

        $info = $this->model->viewInfo($id);

        $data = $this->model->getSaleByID($id,$id_client);
        $this->view->sales = $data[0];
        $this->view->clients = $data[1];

        foreach($info as $data){
            $dataPay = explode(',',$data['pay_info']);
            $this->view->saleInfoPay = $dataPay;

            $dataProds = explode('|',$data['products']);
            $this->view->saleInfoProds = $dataProds;
        }
        $this->view->render("sales/view-sale");
    }

    function addSale(){
        $date       = $_POST['date'];
        $id_client  = $_POST['id_client'];
        $status     = 'Pendiente';

        $productSelected    = $_POST['productselected'];
        $quantity           = $_POST['count'];

        $count = count($productSelected);
        $i = 0;
        $product = array();

        do{ 
            $add = $productSelected[$i].'_'.$quantity[$i];
            array_splice($product, $i, 0, $add);
            $i++;
        }while($i < $count);

        $total = 0;
        $i = 0;

        do{ 
            $productPrice = $productSelected[$i];
            $productPrice = explode('_', $productPrice);
            $productPrice[4] *= $quantity[$i];
            $total += $productPrice[4];
            $i++;
        }while($i < $count);
        
        $products = implode('|',$product);

        if($_POST['confirm_method'] == 0){
            $pay_info = array('card',$_POST['num_card'],$_POST['titular_card'],$_POST['expirate_date'],$_POST['security_cod'],$_POST['bank'],$_POST['card_type']);
            $pay_info = implode(',',$pay_info);
        }else if($_POST['confirm_method'] == 1){
            $pay_info = array('cash',$_POST['cash_name'],$_POST['cash_cod']);
            $pay_info = implode(',',$pay_info);
        }else if($_POST['confirm_method'] == 2){
            $pay_info = array('nequi',$_POST['nequi_name'],$_POST['nequi_num']);
            $pay_info = implode(',',$pay_info);
        }
        
        if($this->model->insertSale([
            'cod'       => 'N'.rand(1111,2222),
            'date'      => $date,
            'id_client' => $id_client,
            'status'    => $status,
            'products'  => $products,
            'pay_info'  => $pay_info,
            'total'     => $total
        ])){
            header('Location: ../sales');
            exit();
        }else{
            
        }
    }

    function editStatus($id){
        session_start();
        $_SESSION['id_sale'] = $id[0];
        $id = $_SESSION['id_sale'];
        $status = $_GET['status'];

        $this->model->updateStatus([
            'id'            => $id,
            'status'        => $status
        ]);
        header('Location: ../');
        exit();
        
    }

    function deleteSale($param){
        $id = $param[0];
        $this->model->deleteSale($id);
    }
}

?>