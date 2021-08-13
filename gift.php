<?php
session_start();


include('auth/layout/header.php');
include('dataBase/userClass.php');
include('dataBase/giftClass.php');


if (!$_SESSION['token']) {
    header('location:auth/login.php');

}

$query = new User();
$queryGift = new giftClass();
$me = $query->getUserBytoken($_SESSION['token']);
$gift = $queryGift->getGift();

?>





<div class="limiter">
    <div class="container-profile">
        <div class="container-profile">


        <div class="wrap-payment">
            <h2> <?= $gift['title'] ?></h2>
            <div class="gift">
                <?= $gift['desc'] ?>
            </div>

            <h2> <a href="index.php" type="button" class="btn btn-success btn-lg ">شروع  بازی </a></h2>
        </div>
<div


    </div>

</div>




