<?php

header('Content-Type: application/json');
include '../../dataBase/userClass.php';

if (
    isset($_REQUEST["token"]) && $_REQUEST["token"] != "" &&
    isset($_REQUEST["health"]) && $_REQUEST["health"] != ""

) {

    $query = new User();
    $token = $_REQUEST["token"];
    $health = $_REQUEST["health"];
    $user= $query->getUserBytoken($token);
    $newHealth = $health +$user['health'];


    if ($query->addHealth($token, $newHealth)) {
        $response = [
            "result" => true,
        ];

    } else {
        $response = [
            "result" => false,
        ];

    }

} else {
    $response = [
        "result" => false,
    ];
}


echo json_encode($response);