<?php

define("SQLFILE", "drinks.sql");

include '../libs/Smarty.class.php';
$smarty = new Smarty();

if(isset($_POST["host"]) && isset($_POST["user"]) && isset($_POST["db-pw"]) && isset($_POST["dbname"])){

  try {
      $validConnection = new PDO('mysql:host='.$_POST["host"].';charset=utf8', $_POST["user"], $_POST["db-pw"]);
  } catch (PDOException $e) {
      $validConnection = false;
  }

  if($validConnection){
    $configFile = "config.php";
    $file = file($configFile);
    $file[2] = changeValue($file[2], $_POST["host"]);
    $file[3] = changeValue($file[3], $_POST["user"]);
    $file[4] = changeValue($file[4], $_POST["db-pw"]);
    $file[5] = changeValue($file[5], $_POST["dbname"]);
    file_put_contents($configFile, $file);

    $smarty->assign("assigned", true);
    $querys = getSQL(SQLFILE);
    $dbname = $_POST["dbname"];

    if(isset($_POST['empty'])) $validConnection->exec('DROP DATABASE IF EXISTS '.$dbname);
    $validConnection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
    $validConnection->exec('USE '.$dbname);

    if(isset($_POST['add'])){
      $i = 0;
      while ($i < count($querys) && strlen($validConnection->errorInfo()[2]) == 0) {
        $validConnection->exec($querys[$i]);
        $i++;
      }
      if($i == count($querys)) $smarty->assign("db_right", 1);
      else $smarty->assign("db_right", $validConnection->errorInfo()[2]);
    }

  } else $smarty->assign("assigned", false);
  $smarty->display("errors.tpl");

}
else $smarty->display("install.tpl");

function getSQL($name){
  $querys = fopen($name, "r+");
  $sql = "";
  while (!feof($querys)) {
    $line = fgets($querys);
    $line = str_replace("'", '"', $line);
    if(!preg_match('/--/', $line))   $sql .= $line;
  }
  fclose($querys);
  $querys = explode(";", $sql);
  unset($querys[count($querys)-1]);
  return $querys;
}

function changeValue($variable, $value){
  $start = '';
  $end = '");';
  $i = 0;
  while ($i < strlen($variable) && !strpos($start, ', "')) {
    $start .= $variable[$i];
    $i++;
  }
  $newVar = $start.$value.$end.PHP_EOL;
  return $newVar;
}

?>
