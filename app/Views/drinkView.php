<?php

require_once './libs/Smarty.class.php';
require_once './app/Views/connectionView.php';

class DrinkView extends ConnectionView{
    function __construct(){
        parent::__construct();
    }

    function showDrinks($drinks){

        $this->smarty->assign('count', count($drinks));
        $this->smarty->assign('drinks', $drinks);
        $this->smarty->display('drinkList.tpl');
    }

    function showFormDrink($param, $id, $drink){
        
        $this->smarty->assign('param', $param);
        $this->smarty->assign('drink', $drink);
        $this->smarty->assign('id', $id);
        $this->smarty->display('formDrink.tpl');
    }
}
