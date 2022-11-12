<?php
require_once './libs/Smarty.class.php';

class AuthView extends ConnectionView{
    
    function __construct(){
        parent::__construct();
    }

    function showLogin($e = null){
        $this->smarty->assign("error", $e);
        $this->smarty->display("login.tpl");
    }
}
