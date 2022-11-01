<?php

require_once './libs/Smarty.class.php';

class CategoryView extends ConectionView{
    
    function __construct(){
        parent::__construct();      
    }

    function showCategories($descriptions){
        $this->smarty->assign('count', count($descriptions));
        $this->smarty->assign('descriptions', $descriptions);    }

    function showFormCategories($param, $id, $category){
        $this->smarty->assign('param', $param);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('id', $id); 
        $this->smarty->display('categories.tpl');
    }
}
?>