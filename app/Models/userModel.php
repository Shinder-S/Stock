<?php

class UserModel extends PathModel{

    function __construct(){
        parent::__construct();
    }

    function getEmailUser($email){
        $sentence = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $sentence->execute(array($email));

        return $sentence->fetch(PDO::FETCH_OBJ);
    }
}