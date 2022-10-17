<?php

require_once('libs/Smarty.class.php');

class UserView {
    function __construct(){

    }

    public function displayLogin(){
        $smarty = new Smarty();
        $smarty->assign('title',"login");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/login.tpl');
    }

    public function displayCategories(){
        $smarty = new Smarty();
        $smarty->assign('title',"categories");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/categories.tpl');
    }
}