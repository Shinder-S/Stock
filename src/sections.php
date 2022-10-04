<?php

function getDrinks(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_stock;charset=utf8', 'root', '');

    $query = $db->prepare('SELECT * FROM drinks');
    $query->execute();

    $drinks = $query->fetchAll(PDO::FETCH_OBJ);

    return $drinks;
}

$drinks = getDrinks();

echo "<ul>";
foreach ($drinks as $drink) {
    echo "<li>$drink->brand</li>";
}
echo "</ul>";