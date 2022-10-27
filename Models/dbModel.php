<?php
$path = 'database/';
if(strpos(pathinfo($_SERVER["SCRIPT_FILENAME"])["dirname"], 'api')) $path = "../" . $path;
include_once $path . 'config.php';

abstract class dbModel{
    protected $db;
    function __construct() {
        try{
            $this->db = new PDO('mysql:host='.HOST.';dbname='.rtrim(DBNAME).';charset=utf8', USER, DBPASS);
        } catch(PDOException $e){
            header('Location: db/index.php');
            die();
        }
    }
}
?>