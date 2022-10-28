<?php
include_once (dirname(__DIR__)."./Models/UserModel.php");
include_once (dirname(__DIR__)."./Views/UserView.php");

class UserController {

    private $userModel;
    private $userView;

	function __construct(){
        $this->userModel = new UserModel();
        $this->userView = new UserView();
    }
    
    function login(){
        if (!isset($_POST['user']) && !isset($_POST["password"]))
        $this->userView->show([]);
        else{
          $user = $_POST['user'];
          $pass = $_POST['password'];
          $hash = $this->userModel->getUserEmail($user)['pass'];
            if(password_verify($pass, $hash)){
                session_start();
                $_SERVER['USER'] = $user;
                header("Location: index.php");
                die();
            }
            else{
                $error = "User pass error";
                echo($error);
            }
        }        
    }

    function getCredential($credential){
        session_start();
        if(!isset($_SESSION['USER']) || $credential != $this->userModel->getCredentials($_SESSION['USER'])){
            header("Location: index.php");
            die();
        }
    }

    function checkLogin(){
        session_start();
        if(!isset($_SESSION['USER']))
            return false;
        return true;
    }

    public function check(){
        if(!isset($_SESSION['USER']))
            return false;
        else
            return true;;
    }

    function getUser(){
        return $this->userModel->getUserEmail($_SESSION['USER']);
    }

    function getCredentials(){
        session_start();
        $credential = $this->userModel->getCredential($_SESSION['USER']);
        return $credential;
    }

    function logOut(){
        session_start();
        session_destroy();
        header("Location: index.php");
        die();
    }

    function showRecord(){
        $this->userView->showRecord();
    }

    function newUser(){
        if(isset($_POST['email'])){
            if(!$this->userModel->getUser($_POST['email'])){
                $newUser = array();
                $newUser['name'] = $_POST['userName'];
                $newUser['email'] = $_POST['email'];
                $newUser['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->userModel->createUser($newUser);
                $this->userView->registeredUser($newUser['name']);
            }
            else
                echo "Already registered user";
        }
    }
    
    function deleteUser(){
        if(isset($_GET["id"])){
            $id_user = $_GET["id"];
            $user = $this->userModel->deleteUser($id_user);
            $users = $this->userModel->getUsers();
            $this->userView->show_admin_users($users);
        }
    }

    function changeCredential(){
        if(isset($_GET["id"])){
            $id_user = $_GET["id"];
            $user = $this->userModel->changeCredential($id_user);
            $users = $this->userModel->getUsers();
            $this->userView->show_admin_users($users);
        }
    }

    function adminUser(){
        $users = $this->userModel->getUsers();
        $this->userView->show_admin_users($users);
    }
}
?>