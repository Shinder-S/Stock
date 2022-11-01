<?php

require_once './app/Models/pathModel.php';

class DrinkModel extends PathModel{
    
    function __construct(){
        parent::__construct();
    }
    
    function getDrinksNames(){
        $query = $this->db->prepare( "SELECT id_drink, name from drinks ORDER BY name");
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
        return $drinks;
    }

    function getDrinkById($id){
        $sentence = $this->db->prepare( "SELECT * from drinks where id_drink= ?");
        $sentence->execute([$id]);
        $drink = $sentence->fetch(PDO::FETCH_OBJ);

        return $drink;
    }

    function getAllDrinks(){
        $query = $this->db->prepare( "SELECT * from drinks ORDER BY name");
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $drinks;
    }

    function insertDrink($name, $brand, $amount){
        $query = $this->db->prepare("INSERT INTO drinks(name,brand,amount) VALUES(?,?,?)");
        $query->execute(array($name,$brand,$amount));

        return $this->db->lastInsertId();
    }

    function updateDrink($id, $name, $brand, $amount){
        $query =  $this->db->prepare("UPDATE drinks SET name = ?, brand = ?, amount = ? WHERE id=?");
        $query->execute(array($name, $brand, $amount, $id));
    }

    function deleteDrink($id){
        $query = $this->db->prepare("DELETE FROM drinks WHERE id=?");
        $query->execute(array($id));
    }
}
?>