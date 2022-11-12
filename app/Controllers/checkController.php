<?php

class CheckController{
    protected $view;
    protected $model;

    function sessionStart(){
        session_start();
    }

    function __construct(){
        $this->sessionStart();
    }

    protected function checkLogIn(){
        if(!isset($_SESSION['IS_LOGGED'])){
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }
}