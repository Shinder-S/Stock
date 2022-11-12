<?php
require_once './app/Controllers/drinkController.php';
require_once './app/Controllers/generalController.php';
require_once './app/Controllers/categoryController.php';
require_once './app/Controllers/alcoholContentController.php';
require_once './app/Controllers/authController.php';

define("BASE_URL", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if(!empty($_GET['action']))
    $action = $_GET['action'];

$params = explode('/', $action);

switch ($params[0]){
    case 'home':
        $GeneralController = new GeneralController();
        $GeneralController->showHome();
        break;
    case 'description':
        $GeneralController = new GeneralController();
        $GeneralController->showDescription();
        break;
    case 'login':
        $AuthController = new AuthController();
        $AuthController->showLogin();
        break;
    case 'validate':
        $AuthController = new AuthController();
        $AuthController->validationUser();
        break;
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
        break;
    case 'Drink':
        if(isset($params[1]) && ($params[1])){
            switch($params[1]){
                case 'form':
                    $DrinkController = new DrinkController();
                    if(isset($params[3]))
                        $DrinkController->showFormDrinks($parms[2], $params[3]);
                    else
                        $DrinkController->showFormDrinks($params[2]);
                    break;
                case 'add':
                    $DrinkController = new DrinkController();
                    $DrinkController->addDrink();
                    break;
                case 'edit':
                    $DrinkController = new DrinkController();
                    $DrinkController->editDrink($params[2]);
                    break;
                case 'confirm-delete':
                    $GeneralController = new GeneralController();
                    $GeneralController->showDelete($params[0], $params[2]);
                    break;
                case 'delete':
                    $DrinkController = new DrinkController();
                    $DrinkController->deleteDrink($params[0], $params[2]);
                    break;
                default:
                    $GeneralController = new GeneralController();
                    $GeneralController->displayError();
                    break;
            }
        }
        else{
            $DrinkController = new DrinkController();
            $DrinkController->showDrinks();
            break;
        }
        break;
    case 'Alcohol Content':
        if(isset($params[1])&&!empty($params[1])){
            switch($params[1]){
                case 'list':
                    $AlcoholContentController = new AlcoholContentController();
                    $AlcoholContentController->showAlcoholContents($params[2]);
                    break;
                case 'form':
                    $AlcoholContentController = new AlcoholContentController();
                    if(isset($params[3])){
                        $AlcoholContentController->showFormAlcoholContent($params[2], $params[3]);
                    }
                    else{
                        $AlcoholContentController->showFormAlcoholContent($params[2]);
                    }
                    break;
                case 'add':
                    $AlcoholContentController = new AlcoholContentController();
                    $AlcoholContentController->addAlcoholContent();
                    break;
                case 'edit':
                    $AlcoholContentController = new AlcoholContentController();
                    $AlcoholContentController->editAlcoholContent($params[1], $params[2]);
                    break;
                case 'confirm-delete':
                    $GeneralController = new GeneralController();
                    $GeneralController->showDelete($params[0], $params[2]);
                    break;
                case 'delete':
                    $AlcoholContentController = new AlcoholContentController();
                    $AlcoholContentController->deleteAlcoholContent($params[0], $params[2]);
                    break;
                default:
                    $GeneralController = new GeneralController();
                    $GeneralController->displayError();
                    break;
            }
        }
        else{
            $AlcoholContentController = new AlcoholContentController();
            $AlcoholContentController->showAlcoholContents();
            break;
        }
        break;
    case 'Category':
        if(isset($params[1]) && !empty($params[1])){
            switch($params[1]){
                case 'form':
                    $CategoryController = new CategoryController();
                    if(isset($params[3]))
                        $CategoryController->showFormCategory($params[2], $params[3]);
                    else
                        $CategoryController->showFormCategory($params[2]);
                    break;
                case 'add':
                    $CategoryController = new CategoryController();
                    $CategoryController->addCategory();
                    break;
                case 'edit':
                    $CategoryController = new CategoryController();
                    $CategoryController->editCategory($params[2]);
                    break;
                case 'check-delete':
                    $GeneralController = new GeneralController();
                    $GeneralController->showDelete($params[0], $params[2]);
                    break;
                case 'delete':
                    $CategoryController = new CategoryController();
                    $CategoryController->deleteCategory($params[0], $params[2]);
                    break;
                default:
                    $GeneralController = new GeneralController();
                    $GeneralController->displayError();
                    break;
            }
        } else{
            $CategoryController = new CategoryController();
            $CategoryController->showCategories();
            break;
        }
        break;
        
}