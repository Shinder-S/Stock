<?php
require_once('Views/appView.php');
require_once('Models/appModel.php');
require_once('Models/drinkModel.php');

class AppController{
    private $drinkModel;
    private $appModel;
    private $appView;
    private $user;

    public function __construct($userController){
        $this->appView = new AppView();
        $this->appModel = new AppModel();
        $this->drinkModel = new DrinkModel();
        if ($userController->checkLogin())
            $this->user = $userController->getUser();
        else
            $this->user["level"]=1;
        }

    public function home(){
        $this->appView->home($this->user);
    }

    public function showHome(){
        $this->appView->show_home();
    }
}