<?php

require_once "Models/DrinksModel.php";
require_once "Views/DrinksView.php";

class DrinksController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new DrinksModel();
        $this->view = new DrinksView();
    }

    public function checkLogIn(){
        session_starrt();

        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if(isset($SESSION['LAST_ACTIVITY']) && (time() - $SESSION['LAST_ACTIVITY'] > 5000)){
            header("Location: " . URL_LOGOUT);
            die();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function GetDrinks(){
        $this->checkLogIn();
        $drinks = $this->model->GetDrinks();
        $this->view->DisplayDrinks($drinks);
    }

    public function GetDrinksCSR() {
        $this->checkLogIn();
        $this->view->DisplayDrinksCSR();
    }

    public function InsertDrink(){
        $this->checkLogIn();
        $ended = 0;
        if(isset($_POST['ended'])){
            $ended = 1;
        }

        if($_FILES['image']['name']){
            if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png"){
                $this->model->InsertDrink($_POST['drink-name'], $_POST['brand'], $_POST['amount'], $ended, $_FILES['image']);
            }
            else {
                $this->view->showError("Format denied");
                die();
            }
        }
            else {
                $this->view->InsertDrink($_POST['drink-name'], $_POST['brand'], $_POST['amount'], $ended, $_FILES['image']);
                die();
            }
            header("Location: " . BASE_URL);
        }

        public function FinishDrink($id){
            $this->checkLogIn();
            $this->model->FinishDrink($id);
            header("Location: " . BASE_URL);
        }

        public function DeleteDrink($id){
            $this->checkLogIn();
            $this->model->DeleteDrink($id);
            header("Location: " . BASE_URL);
        }

}

?>