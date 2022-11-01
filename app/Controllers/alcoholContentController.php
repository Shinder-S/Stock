<?php

require_once './app/Controllers/generalController.php';
require_once './app/Models/alcoholContent.php';
require_once './app/Models/drinkModel.php';
require_once './app/Views/alcoholContentView.php';

class AlcoholContentController extends GeneralController{

    private $drinkModel;

    function __construct(){
        parent::__construct();
        $this->model = new AlcoholContentModel();
        $this->view = new AlcoholContentView();
        $this->drinkModel = new DrinkModel();
    }

    function showAlcoholContent($name = null){
        if(isset($name))
            $alcoholContent = $this->model->getAlcoholContentByCategory($name);
        else
            $alcoholContent = $this->model->getAllAlcoholContents();
        $this->view->showAlcoholContent($alcoholContent);
    }

    function showFormAlcoholContent($param, $id = null){
        $this->checkLogIn();
        $drinks = $this->drinkModel->getDrinksNames();
        $categories = null;
        if(isset($id))
            $categories = $this->model->getAlcoholContentByCategory($id);
        $this->view->showFormAlcoholContent($param, $id, $drinks, $categories);
    }

    function addAlcoholContent(){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $id_category = $_POST['id_category'];
        $this->model->insertAlcoholContent($name, $brand, $id_category);
        $this->view->showMessage($name);
    }

    function editAlcoholContent($id){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $id_category = (int)$_POST['id_category'];
        $this->model->editAlcoholContent($name, $brand, $id_category, $id);
        $this->view->showMessage($name);
    }

    function deleteAlcoholContent($table, $id){
        $this->checkLogIn();
        $this->model->deleteAlcoholContentById($id);
        $this->view->showMessage($table, $id);
    }
}