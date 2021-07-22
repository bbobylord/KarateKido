<?php include('layout/header.php') ?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="../assets/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form"  method="post" action="../action/user/loginUser.php" >
                <span class="login100-form-title">
                    بازی
                </span>
                <?php
                if (isset($_GET['error'])) {
                    $errors = json_decode($_GET['error']);
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>


                        <?php
                    }

                    unset($_GET['error']);
                }
                ?>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" placeholder="نام کاربری">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="رمز عبور">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        ورود
                    </button>
                </div>

                <div class="text-center p-t-12">

                    <a class="txt2" href="#">
                        فراموشی رمز عبور
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="register.php">
                        ساخت اکانت جدید
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('layout/footer.php') ?>