<?php

require_once './app/Models/pathModel.php';

class DrinkModel extends PathModel{
    
    function __construct(){
        parent::__construct();
    }
    
    function getDrinksNames(){
        $query = $this->db->prepare( "SELECT id_drink, name from drink ORDER BY name");
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
        return $drinks;
    }

    function getDrinkById($id){
        $query = $this->db->prepare( "SELECT * from drink where id_drink= ?");
        $query->execute([$id]);
        $drink = $query->fetch(PDO::FETCH_OBJ);

        return $drink;
    }

    function getAllDrinks(){
        $query = $this->db->prepare( "SELECT * from drink ORDER BY name");
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $drinks;
    }

    function insertDrink($name, $brand, $amount){
        $query = $this->db->prepare("INSERT INTO drink(name,brand,amount) VALUES(?,?,?)");
        $query->execute(array($name,$brand,$amount));

        return $this->db->lastInsertId();
    }

    function updateDrink($id, $name, $brand, $amount){
        $query =  $this->db->prepare("UPDATE drink SET name = ?, brand = ?, amount = ? WHERE id=?");
        $query->execute(array($name, $brand, $amount, $id));
    }

    function deleteDrinkById($id){
        $query = $this->db->prepare("DELETE FROM drink WHERE id_drink = ?");
        $query->execute(array($id));
    }
}
