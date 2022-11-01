<?php

require_once './app/Controllers/checkController.php';
require_once './app/Views/connectionView.php';

class GeneralController extends CheckController{

    function __construct(){
        parent::__construct();
        $this->view = new ConectionView();
    }

    function showHome(){
        $this->view->showHome();
    }

    function showDescription(){
        $this->view->showDescription();
    }

    function displayError(){
        $this->view->showError();
    }

    function showDelete($item, $id){
        $this->checkLogIn();
        $this->view->showDelete($item, $id);
    }
}
?>