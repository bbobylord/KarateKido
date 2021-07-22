<?php
include('layout/header.php');


?>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="../action/user/addUser.php"  autocomplete="off">
                <span class="login100-form-title">
                    ثبت نام
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


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="نام کاربری"  autocomplete="false>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="tel" name="phone" placeholder="شماره موبایل" autocomplete="false>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="firstName" placeholder="نام" autocomplete="false>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="lastName" placeholder="نام خانوادگی" autocomplete="false>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="رمز عبور" autocomplete="false>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            ثبت نام
                        </button>
                    </div>


                    <div class="text-center p-t-136">
                        <a class="txt2" href="login.php">
                            ورود
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include('layout/footer.php') ?>