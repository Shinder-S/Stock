<?php

require_once('libs/Smarty.class.php');

class UserView {
    function __construct(){

    }

    public function DisplayLogin(){
        $smarty = new Smarty();
        $smarty->assign('title',"Login");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/login.tpl');
    }
}