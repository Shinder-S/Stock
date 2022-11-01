<?php

class PathModel {
    protected $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_stock;charset=utf8', 'root', '');
    }
   
}