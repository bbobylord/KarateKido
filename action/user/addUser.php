<?php
include '../../utils/blockInjection.php';
include '../../dataBase/userClass.php';
include '../../dataBase/validateClass.php';
session_start();
if (
    isset($_REQUEST["username"]) && $_REQUEST["username"] != "" &&
    isset($_REQUEST["phone"]) && $_REQUEST["phone"] != "" &&
    isset($_REQUEST["firstName"]) && $_REQUEST["firstName"] != "" &&
    isset($_REQUEST["lastName"]) && $_REQUEST["lastName"] != "" &&
    isset($_REQUEST["password"]) && $_REQUEST["password"] != ""
) {
    $query = new User();
    $validate = new validateClass();
    $randomNumber = rand(10,10000);

    $userName = htmlentities($_POST['username']);
    $phone = htmlentities($_POST['phone']);
    $firstName = htmlentities($_POST['firstName']);
    $lastName = htmlentities($_POST['lastName']);
    $password = md5($_POST['password']);
    $token = md5($userName .$randomNumber. $phone . $firstName.$randomNumber);

    var_dump($phone);
    $error = $validate->validateAddUser($userName, $phone, $password);
    if (count($error) > 0){
        return header('Location: /game/auth/register.php?error='. json_encode($error));
    }

    if ($query->adduser($userName, $phone, $firstName, $lastName, $password,$token)) {
        $_SESSION["token"] = $token;
        $_SESSION["username"] = $userName;
        $_SESSION["phone"] = $phone;
        return header('Location: /game/auth/doneRegister.php');

    }
} else {
    $error =['پرکردن تمامی فیلد ها اجباری است'];
    return header('Location: /game/auth/register.php?error='. json_encode($error));


}