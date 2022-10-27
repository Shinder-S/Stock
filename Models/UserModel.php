<?php
include_once('dbModel.php');

class UserModel extends dbModel{

    function getUser($userid){
        $sentence = $this->db->prepare("SELECT * from user WHERE id_user=?");
        $sentence->execute(array($userid));
        return $sentence->fetch(PDO::FETCH_ASSOC);
      }

    function getUserEmail($email){
        $sentence = $this->db->prepare("SELECT * from user WHERE email=?");
        $sentence->execute(array($email));
        return $sentence->fetch(PDO::FETCH_ASSOC);
    }
    function createUser ($newUser) {
        $sentence = $this->db->prepare("INSERT INTO user(id,email,pass) VALUES(:id,:email,:password)");
        $sentence->execute($newUser);
    }
    function deleteUser($id_user){
        $delete =$this->db->prepare("DELETE FROM user WHERE id_user=?");
        $delete->execute(array($id_user));
    }

    function changeCredential($id_user){
        $delete =$this->db->prepare("UPDATE `user` SET `credential` = '2' WHERE `user`.`id_user` = ?");
        $delete->execute(array($id_user));
    }

    function getUsers(){
        $sentence =$this->db->prepare("SELECT * FROM user");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_ASSOC);
    }
}