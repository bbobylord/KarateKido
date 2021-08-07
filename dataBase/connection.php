<?php

$servername= "localhost";
$username = "karateki_karateki";
$password = "27sik@4M1:VCQp";
$dbName="karateki_game";

session_start();
session_set_cookie_params(0);
try {
    $connection = new PDO ("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
    return $connection;
}
catch(PDOException $error)
{                               
    echo "Error in connect to Database";
}
?>