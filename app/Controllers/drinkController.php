<?php

require_once('./app/Controllers/generalController.php');
require_once('./app/Models/drinkModel.php');
require_once('./app/Views/drinkView.php');

class DrinkController extends GeneralController{

    function __construct(){
        parent::__construct();
        $this->model = new DrinkModel();
        $this->view = new DrinkView();
    }
    
    function addDrink(){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];

        $this->model->insertDrink($name, $brand, $category);
        $this->view->showEditMessage($name);
    }

    function showCategories($param, $id=null){
        $this->checkLogIn();
        $drink = null;
        if(isset($id))
            $drink = $this->model->getDrinksById($param, $id, $drink);
        $this->view->showCategories($param, $id, $drink);
    }

    function deleteDrink($table, $id){
        $this->checkLogIn();
        $this->model->deleteDrink($id);
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

    function updateDrink($id){
        $this->checkLogIn();
        $this->model->updateDrink($id, $_POST['name'], $_POST['brand'], $_POST['amount'], $_POST['id_category']);
        header("Location: " . BASE_URL);
    }
    
    
}

?>