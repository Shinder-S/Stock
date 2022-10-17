<?php
require_once "Controllers/DrinksController.php";
require_once "Controllers/UserController.php";

$action = $_GET["action"];
define("BASE_URL", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define("URL_DRINKS", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/drinks');
define("URL_CATEGORIES", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/categories');
define('URL_LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('URL_LOGOUT', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/logout');

$controller = new DrinksController();

if($action == ''){
    $controller->getDrinks();
}else{
    if(isset($action)){
        $partsURL = explode("/", $action);

        if($partsURL[0] == "drinks")
            $controller->getDrinks();
        elseif($partsURL[0] == "insert") 
            $controller->insertDrink();
        elseif($partsURL[0] == "update") 
            $controller->updateDrink($partsURL[1]);
        elseif($partsURL[0] == "delete") 
            $controller->deleteDrink($partsURL[1]);
        elseif($partsURL[0] == "login") {
            $controllerUser = new UserController();
            $controllerUser->login();
        }elseif($partsURL[0] == "sessionStart") {
            $controllerUser = new UserController();
            $controllerUser->sessionStart();
        }elseif($partsURL[0] == "logout") {
            $controllerUser = new UserController();
            $controllerUser->logout();
        }
    }
}