<?php
require('Controllers/userController.php');
require('Controllers/drinksController.php');
require('Controllers/appController.php');
require('Controllers/config.php');

$userController = new UserController();
$drinksController = new DrinksController();
$appController = new AppController();

switch (isset($_GET[config::$mode]) ? $_GET[config::$mode] : config::$mode_default) {

    case config::$mode_home:
        $drinkAppController->showHome();
    break;
  
    case config::$mode:
        $drinkAppController->showhome();
    break;
  
    case config::$mode_deleteUser:
        $userController->deleteUser();
    break;
    case config::$mode_changeCredential:
        $userController->changeCredential();
    break;

    case config::$mode_login:
        $userController->login();
    break;

    case config::$mode_adminUser:
        $userController->adminUser();
    break;
    case config::$mode_newUser:
        $userController->newUser();
    break;

    case config::$mode_registeredUser:
        $userController->showRecord();
    break;

    case config::$mode_exit:
        $userController->logout();
    break;


    case config::$mode_showRecord:
        $drinkAppController->showRecord();
    break;

    case config::$mode_showImagesDescription:
        $drinkAppController->showImagesDescription();
    break;

    case config::$mode_image:
        $drinkAppController->uploadImage();
    break;

    //----<Data Drinks>-----


    case config::$mode_showDrinks:
        $drinkController->showDrinks();
    break;

    case config::$mode_addDrink:
        $drinkController->insertDrink();
    break;

    case config::$mode_updateDrink:
        $drinkController->updateDrink();
    break;

    case config::$mode_editDrink:
        $drinkController->editDrink();
    break;

    case config::$mode_deleteDrink:
        $drinkController->deleteDrink();
    break;

    case config::$mode_adminDrinks:
        $drinkController->adminDrinks();
    break;

    //----<Data Description>-----

    case config::$mode_showDescriptionDrink:
        $drinkController->showDescriptionDrink();
    break;

    case config::$mode_adminDrinks:
        $drinkController->adminDrinks();
    break;

    case config::$mode_addDescription:
        $drinkController->insertDescription();
    break;

    case config::$mode_editDrink:
        $drinkController->editDrink();
    break;

    case config::$mode_updateDrink:
        $drinkController->updateDrink();
    break;

    case config::$mode_showDescription:
        $drinkController->showDrinks();
    break;

    case config::$mode_deleteDrink:
        $drinkController->deleteDrink();
    break;

    default:
    $drinkAppController->home();
    break;
}
?>