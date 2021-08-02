<?php

$servername= "localhost";
$username = "erfantes_game";
$password = "GVYvUAo7)#4b";
$dbName="erfantes_game";

try {
    $connection = new PDO ("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
    return $connection;
}
catch(PDOException $error)
{                               
    echo "Error in connect to Database";
}
?>