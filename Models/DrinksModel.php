<?php

class DrinksModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_stock;charset=utf8', 'root', '');
    }
    
    public function getDrink($id){
        $sentence = $this->db->prepare( "SELECT * from drinks where id= ?");
        $sentence->execute([$id]);
        $drink = $sentence->fetch(PDO::FETCH_OBJ);

        return $drink;
    }

    public function getDrinks(){
        $sentence = $this->db->prepare( "SELECT * from drinks");
        $sentence->execute();
        $drinks = $sentence->fetchAll(PDO::FETCH_OBJ);
        
        return $drinks;
    }

    public function insertDrink($name, $brand, $amount, $id_category){
        $sentence = $this->db->prepare("INSERT INTO drinks(name,brand,amount,id_category) VALUES(?,?,?,?)");
        $sentence->execute(array($name,$brand,$amount,$id_category));
        return $this->db->lastInsertId();
    }

    public function updateDrink($id, $name, $brand, $amount, $id_category){
        $sentence =  $this->db->prepare("UPDATE drinks SET name=?, brand=?, amount=?, id_category=? WHERE id=?");
        $sentence->execute(array( $name, $brand, $amount, $id_category, $id));
    }

    public function deleteDrink($id){
        $sentence = $this->db->prepare("DELETE FROM drinks WHERE id=?");
        $sentence->execute(array($id));
    }
    
    public function getDescription(){
        $sentence = $this->db->prepare( "SELECT * from categories");
        $sentence->execute();
        $categories = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

}
?>