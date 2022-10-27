<?php

include_once(dirname(__DIR__).'/libs/Smarty.class.php');

class UserView {
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function show(){
        $this->smarty->display('login.tpl');
    }

    function showRecord(){
        $this->smarty->display('registerUser.tpl');
    }

    function registeredUser($user){
        $this->smarty->assign('user', $user);
        $this->smarty->display('registeredUser.tpl');
    }

    function show_admin_users($users){
        $this->smarty->assign('users',$users);
        $this->smarty->display('adminUsers.tpl');
    }

}