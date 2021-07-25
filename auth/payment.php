<?php

include('../dataBase/userClass.php');
session_start();
if (!$_SESSION['token']) {
    header('location:auth/login.php');
}

$query = new User();
$user = $query->getUserBytoken($_SESSION['token']);

?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>Card</title>
        <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v29.1.0/dist/font-face.css" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" href="../assets/payment/Style.css">
    </head>
    <body>

    <div class="container">

        <div class="card">
            <div class="circle">
                <h2>10</h2>
            </div>
            <div class="content" >
                <article>
                    <strong>
                        قیمت فعلی
                        <p>15.000 تومان</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        تخفیف
                        <p>25%</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        قیمت قبلی
                        <p>20.000</p>
                    </strong>
                </article>
            </div>
            <a href="#"  id="pay"  onclick="addPayment(1)" >خرید</a>
        </div>
        <div class="card" >
            <div class="circle">
                <h2>20</h2>
            </div>
            <div class="content">
                <article>
                    <strong>
                        قیمت فعلی
                        <p>30.000 تومان</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        تخفیف
                        <p>25%</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        قیمت قبلی
                        <p>40.000</p>
                    </strong>
                </article>
            </div>
            <a href="#"  id="pay"  onclick="addPayment(2)" >خرید</a>
        </div>
        <div class="card">
            <div class="circle">
                <h2>40</h2>
            </div>
            <div class="content">
                <article>
                    <strong>
                        قیمت فعلی
                        <p>60.000 تومان</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        تخفیف
                        <p>25%</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        قیمت قبلی
                        <p>80.000</p>
                    </strong>
                </article>
            </div>
            <a href="#"  id="pay" onclick="addPayment(3)" >خرید</a>
        </div>
        <div class="card" >
            <div class="circle">
                <h2>100</h2>
            </div>
            <div class="content">
                <article>
                    <strong>
                        قیمت فعلی
                        <p>150.000 تومان</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        تخفیف
                        <p>25%</p>
                    </strong>
                </article>
                <article>
                    <strong>
                        قیمت قبلی
                        <p>200.000</p>
                    </strong>
                </article>
            </div>
            <a href="#"  id="pay"  onclick="addPayment(4)">خرید</a>
        </div>
    </div>
    </body>
    </html>


    <script>
        const divToken = document.querySelector("#token");
        const token = divToken.dataset.id
        localStorage.setItem('token', token)
    </script>
        <script src="../assets/js/paymentController.js">

        </script>

<?php include('layout/footer.php') ?>