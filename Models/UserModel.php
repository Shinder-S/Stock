<?php

class UserModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_stock;charset=utf8', 'root', '');
    }

    public function GetPassword($user){
        $sentence = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $sentence->execute(array($user));

        $password = $sentence->fetch(PDO::FETCH_OBJ);

        return $password;
    }
}