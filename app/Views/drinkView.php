<?php

require_once 'libs/Smarty.class.php';

class DrinkView extends ConectionView{
    function __construct(){
        parent::__construct();
    }

    function showDrinks($drinks){

        $this->smarty->assign('count', count($drinks));
        $this->smarty->assign('drinks', $drinks);
        $this->smarty->display('drinkList.tpl');
    }

    function showTableDrink($param, $id, $drink){
        
        $this->smarty->assign('param', $param);
        $this->smarty->assign('drink', $drink);
        $this->smarty->assign('id', $id);
        $this->smarty->display('formDrink.tpl');
    }
}
?>