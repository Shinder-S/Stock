<?php

require_once './app/Models/pathModel.php';

class AlcoholContentModel extends PathModel{
    function __construct(){
        parent::__construct();
    }

    function insertAlcoholContent($name, $brand, $id_category){
        $query = $this->db->prepare("INSERT INTO alcoholContent(naem, brand, id_category) VALUES (?,?,?)");
        $query->execute([$name, $brand, $id_category]);
    }

    function deleteAlcoholContentById($id){
        $query = $this->db->prepare("DELETE FROM alcoholContent WHERE id_category = (?)");
        $query->execute([$id]);
    }

    function editAlcoholContent($name, $brand, $id_category, $id){
        $query = $this->db->prepare("UPDATE alcoholContent SET name = ?, 
                                                            brand = ?,
                                                            id_category = ?
                                    WHERE id_category = ?");
        $query->execute([$name, $brand, $id_category, $id]);
    }
    
    function getAllAlcoholContent(){
        $query = $this->db->prepare("SELECT FROM alcohol_content ORDER BY name");
        $query->execute();

        $alcoholContent = $query->fetchAll(PDO::FETCH_OBJ);

        return $alcoholContent;
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