<?php
require_once "./app/Controllers/checkController.php";
require_once "./app/Models/categoryModel.php";
require_once "./app/Views/categoryView.php";

class CategoryController extends CheckController{
    private $alcoholContentModel;

    function __construct(){
        parent::__construct();
        $this->view = new CategoryView;
        $this->model = new CategoryModel;
        $this->alcoholContentModel = new AlcoholContentModel;
    }
    
    function showCategories($name = null){
    if(isset($name))
        $categories = $this->model->getCategoriesByAlcoholContent($name);
    else
        $categories = $this->model->getAllCategories();
    $this->view->showCategories($categories);
    }

    function showFormCategory($param, $id = null){
        $this->checkLogIn();
        $alcohol_contents = $this->alcoholContentModel->getAlcoholContentsNames();
        $category = null;
        if(isset($id))
            $category = $this->model->getCategory($id);

        $this->view->showFormCategory($param, $id, $alcohol_contents, $category);
    }

    function addCategory(){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $id_category = $_POST['id_category'];
        $id_alcohol_content = $_POST['id_alcohol_content'];

        $this->model->insertCategory($name, $brand, $id_category, $id_alcohol_content);
        
        $this->view->showMessage($name);
    }

    function editCategory($id){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];

        $this->model->editCategory($name, $brand);
        
        $this->view->showMessage($name);
    }

    function deleteCategory($table, $id){
        $this->checkLogIn();
        $this->model->deleteCategoryById($id);
        $this->view->showMessage($table, $id);
    }


}