<?php
include('layout/header.php');
include ('../dataBase/userClass.php');
session_start();
if (!$_SESSION['token'] ){
    header('location:auth/login.php');
}

$query=new User();
$user= $query->getUserBytoken($_SESSION['token']);

?>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-payment">


                <form class="login100-form validate-form" method="post" action="../action/user/addUser.php"
                      autocomplete="off">
                <span class="login100-form-title">
                   درگاه پرداخت
                </span>
                    <div class="alert alert-warning" role="alert">
                        <p>1-قیمت هر جون 1،000 ریال است</p>

                    </div>
                    <div class="alert alert-warning" role="alert">
                        <P>2-میزان سلامت شما : <?= $user['health'] ?> </P>

                    </div>



                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="number" onchange="checkPayment()" name="num_health" id="num_health"
                               placeholder="انتخاب تعداد" autocomplete="false" min="0">
                        <span class=" focus-input100"></span>
                        <span class="symbol-input100">

                    </span>
                    </div>

                    <div id="showPay">

                    </div>


                    <div class="container-login100-form-btn">
                        <button type="button" class="btn btn-primary btn-lg " id="btnPay" onClick="addPayment()">پرداخت</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <script src="../assets/js/paymentController.js">

    </script>

<?php include('layout/footer.php') ?>