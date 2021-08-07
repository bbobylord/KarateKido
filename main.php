<?php
session_start();


include('auth/layout/header.php');
include('dataBase/userClass.php');


if (!$_SESSION['token']) {
    header('location:auth/login.php');

}

$query = new User();
$me = $query->getUserBytoken($_SESSION['token']);

?>
<style>
    .spanShow{
        display: block;
        direction: rtl;
        padding: 10px;
    }
</style>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">امتیاز بازی رایگان</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <p>امتیاز شما در بازی رایگان :   <?= $_GET['point']?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <a href="free.php" type="button" class="btn btn-primary">بازی مجدد</a>
                </div>
            </div>
        </div>
    </div>
    <div class="limiter">
        <div class="container-profile">
            <h1 style="color: #ffffff">karatekido</h1>

            <div class="wrap-payment">

                <div>
                   <div>
                       <a href="action/user/logout.php" type="button" class="btn btn-danger btn-lg ">  خروج </a>

                       <a href="free.php" type="button" class="btn btn-info btn-lg ">  بازی رایگان </a>

                       <a href="index.php" type="button" class="btn btn-success btn-lg ">شروع  بازی </a>
                   </div>


                    <div class="text-center p-t-136">
                        <div class="imgSocial">
                            <a href="https://www.instagram.com/karatekido.ir/">
                                <img src="https://img.icons8.com/color/48/000000/instagram-new--v1.png"/>
                                <p>صفحه ی اینستاگرام</p>
                            </a>
                            <a href="https://t.me/karatekido_ir">
                                <img src="https://img.icons8.com/color/48/000000/telegram-app--v1.png"/>
                                <p >  کانال تلگرام</p>
                            </a>
                        </div>

                        <p style="margin-bottom: 50px;">نمایش لیست برندگان در کانال تلگرام اعلام میشود</p>
                    </div>
                </div>



                <form class="login100-form validate-form">
     <span class="spanShow">
                          نام و نام خانوادگی   :<?= $me["firstName"].' '.$me['lastName'] ?>
                    </span>
                    <span class="spanShow">
                          نام کاربری   :<?= $me["username"] ?>
                    </span>
                    <span class="spanShow">
                          امتیاز روزانه   :<?= $me["point"] ?>
                    </span>
                    <span class="spanShow">
                          امتیاز هفتگی   :<?= $me["weekPoint"] ?>
                    </span>
                    <span class="spanShow">
                         سلامت    :<?= $me["health"] ?>
                    </span>



                    <input hidden id="token" name="token" data-id="<?= $_SESSION["token"] ?>">
                </form>



            </div>



        </div>

    </div>




<?php include('auth/layout/footer.php') ?>
<script>


    const divToken = document.querySelector("#token");
    const token = divToken.dataset.id
    localStorage.setItem('token', token)


    /// open model
    $( document ).ready(function() {
        var point = "<?= $_GET['point']?>";

        if(point){
            $('#exampleModal').modal('show');

        }


    });

</script>
