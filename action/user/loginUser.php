<?php
include '../../utils/blockInjection.php';
include '../../dataBase/userClass.php';
include '../../dataBase/validateClass.php';
session_start();
if (
    isset($_REQUEST["username"]) && $_REQUEST["username"] != "" &&
    isset($_REQUEST["password"]) && $_REQUEST["password"] != ""
) {
    $query = new User();
    $validate = new validateClass();
    $randomNumber = rand(10, 10000);

    $userName = htmlentities($_POST['username']);
    $password = md5($_POST['password']);



    $error = $validate->validationLoginuser($userName, $password);
    if (count($error) > 0) {
        return header('Location: /game/auth/login.php?error=' . json_encode($error));
    } else {
       $user = $query-> getUser($userName);
        $_SESSION["token"] = $user['token'];
        $_SESSION["username"] = $user['username'];
        $_SESSION["phone"] = $user['phone'];
        return header('Location: ../../Game.php');


    }

} else {
    $error = ['پرکردن تمامی فیلد ها اجباری است'];
    return header('Location: /game/auth/login.php?error=' . json_encode($error));


}