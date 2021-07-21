<?php
include('layout/header.php');
include('../dataBase/userClass.php');
session_start();

if (!$_SESSION['token'] ){
    header('location:auth/login.php');

}

$query = new User();
$count = 1;
$users = $query->getPlayer();

$me = $query->getUserBytoken($_SESSION['token']);


?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="../assets/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form">
                <span class="login100-form-title">
                  لیست برترین ها
                </span>


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">point</th>
                        <th scope="col">week</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user){ ?>
                    <tr style="<?= $user['username']== $me['username'] ? 'background-color: antiquewhite' : ''?>">
                        <th scope="row"><?= $count++ ?></th>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['point'] ?></td>
                        <td><?= $user['weekPoint'] ?></td>

                    </tr>
                    <?php } ?>

                    <tr style="background-color: antiquewhite;">
                        <th scope="row">ME</th>
                        <td><?= $me['username'] ?></td>
                        <td><?= $me['point'] ?></td>
                        <td><?= $me['weekPoint'] ?></td>

                    </tr>
                    </tbody>
                </table>
                <a href="../Game.php" type="button" class="btn btn-success btn-lg btn-block">شروع مجدد بازی </a>
                <input hidden id="token" name="token" data-id="<?= $_SESSION["token"] ?>">
            </form>
        </div>
    </div>
</div>

    <script>
        const divToken = document.querySelector("#token");
        const token = divToken.dataset.id
        localStorage.setItem('token', token)

    </script>


<?php include ('layout/footer.php') ?>