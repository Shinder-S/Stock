<?php
require_once 'libs/Smarty.class.php';

class AppView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty;
    }

    function home($user){
        $this->smarty->assign('user',$user);
        $this->smarty->display('templates/index.tpl');
    }

    function showDescription(){
        $this->smarty->display('templates/description.tpl');
      }
  
    function showImagesDescription($drink,$images,$user){
        $this->smarty->assign('drink',$drink);
        $this->smarty->assign('images',$images);
        $this->smarty->assign('user',$user);
        $this->smarty->display('templates/imagesDescription.tpl');
    }
  
    function show_home(){
        $this->smarty->display('templates/navigator.tpl');
    }
}