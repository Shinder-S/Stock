<?php

require_once './libs/Smarty.class.php';

class AlcoholContentView extends ConnectionView{
    
    function __construct(){
        parent::__construct();
    }

    function showAlcoholContents($alcoholContents){
        $this->smarty->assign('count', count($alcoholContents));
        $this->smarty->assign('alcoholContents', $alcoholContents);
        $this->smarty->display('alcoholContentList.tpl');
    }

    function showFormAlcoholContent($param, $id, $drinks, $alcoholContents){
        $this->smarty->assign('param', $param);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('drinks', $drinks);
        $this->smarty->assign('alcoholContent', $alcoholContents);
        $this->smarty->display('formAlcoholContent.tpl');
    }
}