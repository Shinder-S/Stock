<?php
require_once('Views/appView.php');
require_once('Models/appModel.php');
require_once('Models/drinkModel.php');

class AppController{
    private $drinksModel;
    private $appModel;
    private $appView;
    private $user;

        public function __construct(){
            $this->appView = new AppView();
            $this->appModel = new AppModel();
            $this->drinksModel = new DrinksModel();
            /*if ($userController->checkLogin())
                $this->user = $userController->getUser();
            else
                $this->user["level"]=1;
            }*/
        }

        function home(){
            $this->appView->home($this->user);
        }

        function showHome(){
            $this->appView->show_home();
        }

        function showForm(){
            $this->drinkAppView->show_description();
        }

        function getCheckImages($images){
            $checkImages = [];
            for ($i=0; $i < count($images['size']); $i++) {
              if($images['size'][$i]>0 && ($images['type'][$i]=="image/jpeg" || $images['type'][$i]=="image/png")){
                $image_aux = [];
                $image_aux['tmp_name']=$images['tmp_name'][$i];
                $image_aux['name']=$images['name'][$i];
                $checkImages[]=$image_aux;
              }
            }
            return $checkImages;
        }

        function uploadImage(){
            if(isset($_GET['id']) && isset($_FILES['picture'])){
                $id = $_POST;
                $images = $_FILES['picture'];
                if(isset($images)){
                    $checkImages = $this->getCheckImages($images);
                    $this->appDrinkModel->loadImage($id, $checkImages);
                    $images = $this->appDrinkModel->showImages($id);
                    $this->drinkAppModel->showImagesDescription($id,$images);
                } else{
                    $images = $this->appDrinkModel->showImages($id);
                    $this->appDrinkModel->showImagesDescription($id,$images);
                }
            }
        }

        function showPicturesAndDescription(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $images = $this->drinkAppModel->showImages($id);
                $drink = $this->drinksModel->getDrink($id);
                $this->appDrinkView->showImagesDescription($drink, $images, $this->user);
            }
        }
    }    
?>