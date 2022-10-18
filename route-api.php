<?php
require_once("Router.php");
require_once("./api/DrinksApiController.php");

define("BASE_URL", '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$resourse = $_GET["resourse"];

$method = $_SERVER["REQUEST_METHOD"];

$router = new Router();

$router->addRoute("drinks", "GET", "DrinksApiController", "getDrinks");
$router->addRoute("drinks/:ID", "GET", "DrinksApiController", "getDrink");
$router->addRoute("drinks/:ID", "DELETE", "DrinksApiController", "deleteDrinks");
$router->addRoute("drinks", "POST", "DrinksApiController", "addDrink");
$router->addRoute("drinks/:ID", "PUT", "DrinksApiController", "updateDrink");