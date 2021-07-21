<?php
include 'dataBase/userClass.php';
session_start();
$query=new User();


if (!$_SESSION['token'] ){
   header('location:auth/login.php');
}
$token=$_SESSION['token'] ;
$username=$_SESSION['username'] ;
$user= $query->getUser($username);

if ($user['health'] <= 0  ){
    header('location:auth/payment.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Kido</title>
    <link rel="stylesheet" href="./assets/Sass/Style.css">
    <script src="./assets/js/Controller.js"></script>
</head>
<body>
    <main id="Main">
        <input hidden id="token" name="token" data-id="<?=$_SESSION["token"] ?>">
            <header>
                <div class="Time">
                    <div class="Label" id="Label">10 Seconds</div>
                    <div id="Damage" class="Damage">
                    </div>
                </div>
                <div id="Score" class="Score">
                    <div id="point" class="" value="<?= $user['point'] ?>">ponit : <?= $user['point'] ?></div>
                    <div id="point" class="" value="<?= $user['weekPoint'] ?>">weekPoint : <?= $user['weekPoint'] ?></div>
                    <div id="health" class="" value="<?= $user['health'] ?>">health : <?= $user['health'] ?></div>
                    <h3 id="Start" class="Start">Start</h3>
                    <h3 id="Record" class="Record Disable">0</h3>
                </div>
            </header>
            <h1 id="Ready" class="Ready">3</h1>
            <h1 id="End" class="End Disable">End</h1>
            <section class="OK" id="OK">
                <div class="Tree">
                    <div class="TreeFixed" id="TreeFixed">
                        <div class="Cover">
                            <img src="https://s19.picofile.com/file/8437675834/High_Three.png" alt="">
                        </div>
                    </div>
                    <div class="TreeDecreasing" id="TreeDecreasing">
                        <div class="Cover">
                            <img src="https://s19.picofile.com/file/8437675834/High_Three.png" alt="">
                        </div>
                    </div>
                    <div class="AllBranch" id="AllBranch"></div>
                </div>
                <div class="Character" id="Character">
                    <section>
                        <div id="Left" class="img"></div>
                    </section>
                    <section>
                        <div id="Right" class="img Disable"></div>
                    </section>
                    <section class="Dead Disable" id="Dead">
                    </section>
                </div>
            </section>
            <section class="Controller">
                <span class="Btn Btn-Left Disable" id="Btn_Left" onclick="Strick('Left');"></span>
                <span class="Btn Btn-Right Disable" id="Btn_Right" onclick="Strick('Right');"></span>
            </section>
        </section>
    </main>
</body>
</html>