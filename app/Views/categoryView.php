<?php

require_once './libs/Smarty.class.php';

class CategoryView extends ConnectionView{
    
    function __construct(){
        parent::__construct();      
    }

    function showCategory($category){
        $this->smarty->assign('category', $category); 
        $this->smarty->display('category.tpl');
    }

    function showImgError($img = null){
        $this->smarty->assign('image', $img); 
        $this->smarty->display('denied.tpl');
    }

    function showCategories($categories){
        $this->smarty->assign('count', count($categories));
        $this->smarty->assign('categories', $categories);    
        $this->smarty->display('categoryList.tpl');
    }

    function showFormCategory($param, $id, $category){
        $this->smarty->assign('param', $param);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('id', $id); 
        $this->smarty->display('formCategory.tpl');
    }
}
