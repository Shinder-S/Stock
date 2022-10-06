<?php

class DrinksModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=drinks;charset=utf8', 'root', '');
    }

    public function GetDrinks(){
        $sentence = $this->db->prepare( "select * from drinks");
        $sentence->execute();
        $drinks = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $drinks;
    }

    public function GetDrink($id){
        $sentence = $this->db->prepare( "select * from drinks where id= ?");
        $sentence->execute([$id]);
        $drink = $sentence->fetch(PDO::FETCH_OBJ);
        
        return $drink;
    }

    public function InsertDrink($name, $brand, $amount, $id_category, $image = null){
        $filepath = null;
        if($image)
            $filepath = $this->moveFile($image);

        $sentence = $this->db->prepare("INSERT INTO drink(title,brand,amount,id_category, imagen_url) VALUES(?,?,?,?,?)");
        $sentence->execute(array($name,$brand,$amount,$id_category, $filepath));

        return $this->db->lastInsertId();
    }

    private function moveFile($image) {
        $filepath = "img/drink/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        move_uploaded_file($image['tmp_name'], $filepath);
        return $filepath;
    }

    public function EndLoad($id){
        $sentence =  $this->db->prepare("UPDATE drinks SET ended=1 WHERE id=?");
        $sentence->execute(array($id));
    }

    public function RefreshDrink($name, $brand, $amount, $id_category){
        $sentence =  $this->db->prepare("UPDATE drinks SET name=?, brand=?, amount=? WHERE id=?");
        $sentence->execute(array($name, $brand, $amount, $id_category));
    }

    public function DeleteDrink($id){
        $sentence = $this->db->prepare("DELETE FROM drink WHERE id=?");
        $sentence->execute(array($id));
    }
}
?>