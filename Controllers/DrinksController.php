<?php

require_once('Models/DrinksModel.php');
require_once('Views/DrinksView.php');

class DrinksController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new DrinksModel();
        $this->view = new DrinksView();
    }

    public function checkLogIn(){
        session_start();
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

    public function getDrinks(){
        $this->checkLogIn();
        $drinks = $this->model->getDrinks();
        $categories= $this->model->getCategories();
        $this->view->displayTables($drinks, $categories);
    }

    public function insertDrink(){
        $this->checkLogIn();
        $this->model->insertDrink($_POST['name'], $_POST['brand'], $_POST['amount'], $_POST['id_category']);
        header("Location: " . BASE_URL);
    }

    public function deleteDrink($id){
        $this->checkLogIn();
        $this->model->deleteDrink($id);
        header("Location: " . BASE_URL);
    }

    public function getDrink($id){
        $this->checkLogIn();
        $drink = $this->model->getDrink($id);
        $categories= $this->model->getCategories();
        $this->view->displayDrink($drink, $categories);
    }

    public function updateDrink($id){
        $this->checkLogIn();
        $this->model->updateDrink($id, $_POST['name'], $_POST['brand'], $_POST['amount'], $_POST['id_category']);
        header("Location: " . BASE_URL);
    }
    
    
}

?>