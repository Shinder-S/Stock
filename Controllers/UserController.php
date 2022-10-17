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
    
    public function sessionStart(){
        $password = $_POST['pass'];
        $user = $this->model->getPassword($_POST['user']);
        if (isset($user) && $user != null && password_verify($password, $user->password)){
            session_start();
            $_SESSION['user'] = $user->email;
            $_SESSION['userId'] = $user->id;
            header("Location: " . URL_DRINKS);
        }else{
            header("Location: " . URL_LOGIN);
        }
    }

    public function login(){
        $this->view->displayLogin();
    }

    public function logOut(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }
}
?>