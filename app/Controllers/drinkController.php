<?php

require_once './app/Controllers/checkController.php';
require_once './app/Models/drinkModel.php';
require_once './app/Views/drinkView.php';

class DrinkController extends CheckController{

    function __construct(){
        parent::__construct();
        $this->model = new DrinkModel();
        $this->view = new DrinkView();
    }
    
    function showDrinks(){
        $drinks = $this->model->getAllDrinks();
        $this->view->showDrinks($drinks);
    }

    function addDrink(){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $amount = $_POST['amount'];

        $this->model->insertDrink($name, $brand, $amount);
        $this->view->showEditMessage($name);
    }

    function showFormDrink($param, $id=null){
        $this->checkLogIn();
        $drink = null;
        if(isset($id))
            $drink = $this->model->getDrinkById($param, $id, $drink);
        $this->view->showFormDrink($param, $id, $drink);
    }

    function deleteDrink($table, $id){
        $this->checkLogIn();
        $this->model->deleteDrinkById($id);
        $this->view->showMessage($table, $id);
    }

    function editDrink($id){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $amount = $_POST['amount'];

        $this->model->editDrink($name, $brand, $amount, $id);
        $this->view->showEditMessage($name, $id);
    }
 
}