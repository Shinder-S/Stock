<?php
include_once('Models/dbModel.php');

class AppModel extends dbModel{

    function showImages($id){
        $select = $this->db->prepare("SELECT * FROM images WHERE fk_drink=?");
        $select->execute(array($id));
        $images = $select->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }

    function loadImages($id, $images){
        foreach($images as $key => $image){
            $path = "image/".uniqid()."_".$image["name"];
            move_uploaded_file($image["tmp_name"], $path);
            $insert = $this->db->prepare("INSERT TO image(fk_drink,picture) VALUES(?,?)");
            $insert->execute(array($id,$path));
        }
    }
}