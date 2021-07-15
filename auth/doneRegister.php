<?php include('layout/header.php');
session_start();
?>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form">
                <span class="login100-form-title">
                   ثبت نام با موفقیت انجام شد
                </span>  <span class="login100-form-title">
                 نام کاربری   :<?=$_SESSION["username"] ?>
                </span>


                    <a href="../Game.php" type="button" class="btn btn-success btn-lg btn-block">برای ورود به بازی کلیک کنید</a>
                    <input hidden id="token" name="token" data-id="<?=$_SESSION["token"] ?>">
                </form>
            </div>
        </div>
    </div>

    <script>
        const divToken = document.querySelector("#token");
        const token =divToken.dataset.id
        localStorage.setItem('token',token)

    </script>


<?php include('layout/footer.php') ?>