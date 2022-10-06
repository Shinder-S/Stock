<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";

class UserController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }
    
    public function SesionStart(){
        $password = $_POST['pass'];

        $user = $this->model->GetPassword($_POST['user']);

        if (isset($user) && $user != null && password_verify($password, $user->password)){
            session_start();
            $_SESSION['user'] = $user->email;
            $_SESSION['userId'] = $user->id;
            header("Location: " . URL_TAREAS);
        }else{
            header("Location: " . URL_LOGIN);
        }
       // header("Location: " . BASE_URL);
    }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function LogOut(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

    
}


?>