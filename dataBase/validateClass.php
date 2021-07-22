<?php


class validateClass
{
    public $querys;

    function __construct()
    {

        $this->querys = new User();
    }

/// validation add user in regiseter Page
    public function validateAddUser($username, $phone, $password)
    {
        $mesError = [];

        ///-----------------------check userName
        if (strlen($username) < 3) {
            array_push($mesError, 'نام کاربری باید بیشتر از 3 کارکتر باشد ');
        }
        ///-----------------------check phoneNumber
        if (!preg_match("/^09[0-9]{9}$/", $phone)) {
            array_push($mesError, 'لطفا شماره تلفن معتبر وارد کنید ');
        }

        if ($this->querys->checkExistUserPhone($phone)) {
            array_push($mesError, 'همچین نام شماره موبایل از قبل موجود است ');
        }
        ///-----------------------check password
        if (strlen($password) < 8) {
            array_push($mesError, 'رمز عبور باید بیشتر از 8 کارکتر باشد ');
        }

        ///-----------------------check existUser
        if ($this->querys->checkExistUserName($username)) {
            array_push($mesError, 'همچین نام کاربری از قبل موجود است ');
        }


        return $mesError;

    }


    /// validation login user in login Page
    public function validationLoginuser($username, $password)
    {
        $mesError = [];
        if($this->querys->checkForLogin($username,$password)){
            array_push($mesError, 'نام کاربری یا رمز عبور صحیح نمی باشد ، مجددا تلاش کنید');
        }

        return $mesError;
    }
}