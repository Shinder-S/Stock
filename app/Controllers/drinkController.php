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
        $category = $_POST['category'];

        $this->model->insertDrink($name, $brand, $category);
        $this->view->showEditMessage($name);
    }

    function showFormDrinks($param, $id=null){
        $this->checkLogIn();
        $drink = null;
        if(isset($id))
            $drink = $this->model->getDrinksById($param, $id, $drink);
        $this->view->showCategories($param, $id, $drink);
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
        $category = $_POST['category'];

        $this->model->editDrink($name, $brand, $category, $id);
        $this->view->showEditMessage($name, $id);
    }
 
}