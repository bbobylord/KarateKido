<?php

$servername= "localhost";
$username = "root";
$password = "";
$dbName="game";

try {
    $connection = new PDO ("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
    return $connection;
}
catch(PDOException $error)
{                               
    echo "Error in connect to Database";
}
?>