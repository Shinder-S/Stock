<?php
require_once("dbModel.php");
require_once("userModel.php");
require_once("drinkModel.php");

class DescriptionModel extends dbModel{
    private $userModel;
    private $drinksModel;

    function __construct(){
        parent::__construct();
        $this->userModel = new UserModel;
        $this->drinksModel = new DrinksModel;
    }

    function getDrinkDescription($id_category){
        $sentence = $this->db->prepare("SELECT * from category where id_category=?");
        $sentence->execute(array($id_category));
        $descriptions = $sentence->fetchAll(PDO::FETCH_ASSOC);
        foreach($descriptions as $key => $description){
            $descriptions[$key]["user"] = $this->userModel->getUser($description["fk_user"])["nick"];
        }
        return $descriptions;
    }

    function getDrink($id_category){
        $sentence = $this->db->prepare("select * from description where id__category");
        $sentence->execute(array($id_category));
        $description = $sentence->fetch(PDO::FETCH_ASSOC);
        return $description;
    }

    function getDrinks(){
        $sentence = $this->db->prepare("SELECT * from description");
        $sentence->execute();
        $descriptions = $sentence->fetchAll(PDO::FETCH_ASSOC);
        foreach($sentence as $key => $description){
            $descriptions[$key]["email"] = $this->userModel->getUser($description["fk_user"])["email"];
            $descriptions[$key]["description"] = $this->drinksModel->getDescription($description["fk_description"])["id_category"];
        }
        return $descriptions;
    }

    function deleteDescription($id_category){
        $sentence = $this->db->prepare("DELETE from description WHERE id_category=?");
        $sentence->execute(array($id_category));
    }

    function createDescription($id_drink,$user,$description,$amount){
        $sentence = $this->db->prepare("INSERT INTO description(fk_description,fk_user,description,amount) value(?,?,?,?)");
        $sentence->execute(array($id_drink,$user,$description,$amount));
        return $this->db->lastInsertId();
    }
}
?>