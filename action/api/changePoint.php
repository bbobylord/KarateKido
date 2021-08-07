<?php
header('Content-Type: application/json');
include '../../dataBase/userClass.php';
session_start();
//return header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth/remacth.php');
if (
    isset($_REQUEST["token"]) && $_REQUEST["token"] != "" &&
    isset($_REQUEST["point"]) && $_REQUEST["point"] != ""

) {
///tesr

///
    
    $query = new User();
    $token = $_REQUEST["token"];
    $point = $_REQUEST["point"];
    $bestPoint = 0;
    $helthNow = 0;
    $response = [];
    $user = $query->getUserBytoken($token);


    $bestPoint = $user['point'] > $point ? $user['point'] : $point;
    $bestWeekPoint =$user['weekPoint']  > $point ? $user['weekPoint'] : $point;
    $helthNow = $user['health'] - 1;

    if ($query->changePoint($token, $bestPoint, $helthNow,$bestWeekPoint)) {


        $response = [
            "result" => true,
            "token" => $_SESSION['token']
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