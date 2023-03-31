<?php
include_once 'app/libs/controller.php';
include_once 'app/controllers/session.php';

class Login extends Controller{

    
    function __construct(){
        parent::__construct();
    }
    
    function renderView(){
        $this->view->render('login');
    }
    
    function sign_in(){

        if (!empty($_POST["btnSignIn"])){
            
            $userSession = new Sessions_();
            
            if (empty($_POST["email"]) and empty($_POST["password"])){
                $error="empty";
                header("Location: ../login?error=$error");
            } else {
                $user=$_POST["email"];
                $password=$_POST["password"];
                $password=md5($password);
                
                $auth = $this->model->userPass($user,$password);

                if ($auth){
                    $error= "ok"; 
                    // header("Location: ../main");

                    // $userSession->setCurrentUser($user);
                    // $this->view->render('main');
                } else{
                    $error="incorrect";
                    header("Location: ../login?error=$error");
                }
        
            }
            $this->view->message = $error;
        
        }
    }
}

?>