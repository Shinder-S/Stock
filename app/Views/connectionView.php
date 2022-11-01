<?php

require_once './libs/Smarty.class.php';

class ConectionView{
    protected $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showError(){
        $this->smarty->display('errorMessage.tpl');
    }

    function showHome(){
        $this->smarty->display('home.tpl');
    }

    function showMessage($table, $id){
        $this->smarty->assign('table', $table);
        $this->smarty->assign('id', $id);
        $this->smarty->display('message.tpl');
    }

    function showEditMessage($name, $id=null){
        $this->smarty->assign('name', $name);
        $this->smarty->assign('id', $id);
        $this->smarty->display('editMessage.tpl');        
    }
    
    function showDelete($item, $id){
        $this->smarty->assign('item', $item);
        $this->smarty->assign('id', $id);
        $this->smarty->display('delete.tpl');
    }

    function showDescription(){
        $this->smarty->display('drinkDescription.tpl');
    }
}
?>