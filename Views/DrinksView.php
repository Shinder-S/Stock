<?php

require_once('libs/Smarty.class.php');

class drinksView {
    function __construct(){

    }

    public function displayTables($drinks, $categories){

        $smarty = new Smarty();
        $smarty->assign('title', "List of Stock");
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('list_drinks', $drinks);
        $smarty->assign('list_categories', $categories);
        $smarty->display('templates/show_table.tpl');
    }

    public function showError($msg){
        echo $msg;
    }

    public function displayDrink($drink, $categories){
        $smarty = new Smarty();
        $smarty->assign('title', $drink->name);
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('drink', $drink);
        $smarty->assign('list_categories', $categories);
        $smarty->display('templates/show_drink.tpl');
    }
}
?>