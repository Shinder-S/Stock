<?php
require_once "./app/Controllers/generalController.php";
require_once "./app/Models/categoryModel.php";
require_once "./app/Views/categoryView.php";

class CategoryController extends GeneralController{
    private $modelCategory;

    function __construct(){
        parent::__construct();
        $this->view = new CategoryView;
        $this->model = new CategoryModel;
    }
    
    function showCategories(){
        $categories = $this->model->getAllCategories();
        $this->view->showCategories($categories);
    }

    function showFormCategory($param, $id = null){
        $this->checkLogIn();
        $category = null;
        if(isset($id))
            $category = $this->model->getCategoryById($id);
        $this->view->showFormCategory($param, $id, $category);
    }

    function addCategory(){
        $this->checkLogIn();
        $name = $_POST['name'];
        $brand = $_POST['brand'];

        $this->model->insertCategory($name, $brand);
        
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
?>