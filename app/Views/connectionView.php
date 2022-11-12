<?php

require_once './libs/Smarty.class.php';

class ConnectionView{
    protected $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showError(){
        $this->smarty->displayError('error.tpl');
    }

    public function showHome(){
        $this->smarty->display('home.tpl');
    }

    public function showMessage($table, $id){
        $this->smarty->assign('table', $table);
        $this->smarty->assign('id', $id);
        $this->smarty->display('message.tpl');
    }

    public function showEditMessage($name, $id=null){
        $this->smarty->assign('name', $name);
        $this->smarty->assign('id', $id);
        $this->smarty->display('editMessage.tpl');
    }

    public function showDelete($param, $id){
        $this->smarty->assign('param', $param);
        $this->smarty->assign('id', $id);
        $this->smarty->display('delete.tpl');
    }

    public function showDescription(){
        $this->smarty->display('drinkDescription.tpl');
    }
}