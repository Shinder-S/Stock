<?php

require_once './app/Models/pathModel.php';

class AlcoholContentModel extends PathModel{
    function __construct(){
        parent::__construct();
    }

    function insertAlcoholContent($name, $brand, $id_drink){
        $query = $this->db->prepare("INSERT INTO alcoholContent(name, brand, id_drink) VALUES (?,?,?)");
        $query->execute([$name, $brand, $id_drink]);
    }

    function deleteAlcoholContentById($id){
        $query = $this->db->prepare("DELETE FROM alcoholContent WHERE id_alcohol_content = (?)");
        $query->execute([$id]);
    }

    function editAlcoholContent($name, $brand, $id_drink, $id){
        $query = $this->db->prepare("UPDATE alcoholContent SET name = ?, 
                                                            brand = ?,
                                                            id_drink = ?
                                    WHERE id_alcohol_content = ?");
        $query->execute([$name, $brand, $id_drink, $id]);
    }
    
    function getAllAlcoholContent(){
        $query = $this->db->prepare("SELECT FROM alcohol_content ORDER BY name");
        $query->execute();

        $alcoholContents = $query->fetchAll(PDO::FETCH_OBJ);

        return $alcoholContents;
    }

    function getAlcoholContentsNames(){
        $query = $this->db->prepare("SELECT id_alcohol_content, name FROM alcohol_content ORDER BY name");
        $query->execute();

        $alcoholContents = $query->fetchAll(PDO::FETCH_OBJ);

        return $alcoholContents;
    }

    function getAllAlcoholContentById($id){
        $query = $this->db->prepare("SELECT * FROM alcohol_content WHERE id_alcohol_content = ?");
        $query->execute([$id]);

        $alcoholContent = $query->fetchAll(PDO::FETCH_OBJ);

        return $alcoholContent;
    }
}