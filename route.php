<?php
require_once "Controllers/DrinksController.php";
require_once "Controllers/UserController.php";

$action = $_GET["action"];
define("BASE_URL", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define("URL_DRINKS", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/drinks');
define('URL_LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('URL_LOGOUT', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/logout');

$controller = new DrinksController();

if($action == ''){
    $controller->GetDrinks();
}else{
    if(isset($action)){
        $partsURL = explode("/", $action);

        if($partsURL[0] == "drinks")
            $controller->GetDrinks();
        elseif ($partsURL[0] == "drinks-csr") 
            $controller->GetDrinksSCR();
        elseif($partsURL[0] == "insert") 
            $controller->InsertDrink();
        elseif($partsURL[0] == "ended") 
            $controller->RefreshDrink($partesURL[1]);
        elseif($partsURL[0] == "delete") 
            $controller->DeleteDrink($partesURL[1]);
        elseif($partsURL[0] == "login") {
            $controllerUser = new UserController();
            $controllerUser->Login();
        }elseif($partsURL[0] == "sesion start") {
            $controllerUser = new UserController();
            $controllerUser->SesionStart();
        }elseif($partsURL[0] == "logout") {
            $controllerUser = new UserController();
            $controllerUser->Logout();
        }
    }
}