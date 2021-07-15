<?php
header('Content-Type: application/json');
include '../../dataBase/userClass.php';

if (
    isset($_REQUEST["token"]) && $_REQUEST["token"] != "" &&
    isset($_REQUEST["point"]) && $_REQUEST["point"] != ""

) {

    $query = new User();
    $token = $_REQUEST["token"];
    $point = $_REQUEST["point"];
    $bestPoint = 0;
    $helthNow = 0;
    $response = [];
    $user = $query->getUserBytoken($token);


    $bestPoint = $user['point'] > $point ? $user['point'] : $point;
    $helthNow = $user['health'] - 1;

    if ($query->changePoint($token, $bestPoint, $helthNow)) {
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