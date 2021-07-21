<?php
include "connection.php";

class User  {

    public $connect;
    function __construct() {

        $this->connect = $GLOBALS['connection'];
    }



/// add user in database 
    public function adduser($username, $phone,$firstName,$lastName,$password,$token)
    {
        $user_sql = "INSERT INTO `users`(`id`, `username`, `firstName`, `lastName`,`password`,`phone`,`token`) VALUES (null,?,?,?,?,?,?)";
        $user_res = $this->connect->prepare($user_sql);
        $user_res->bindValue(1, $username);
        $user_res->bindValue(2, $firstName);
        $user_res->bindValue(3, $lastName);
        $user_res->bindValue(4, $password);
        $user_res->bindValue(5, (int)$phone);
        $user_res->bindValue(6, $token);


        if ($user_res->execute()) {
          $user_id = $this->connect->lastInsertId();
          return $user_id;
        }else{
          return false;
        }
    }


    /// check exist userName
    public function checkExistUserName ($username){
        $fetch_sql = "SELECT * FROM `users` WHERE `username`= ?";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $username);
        $fetch_res->execute();
        if ($fetch_res->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }else{
            return  false;
        }
    }
    /// check exist phone
    public function checkExistUserPhone ($phone){
        $fetch_sql = "SELECT * FROM `users` WHERE `phone`= ?";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $phone);
        $fetch_res->execute();
        if ($fetch_res->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }else{
            return  false;
        }
    }

    /// check exsit user for login
    public  function  checkForLogin ($username,$password){
        $fetch_sql = "SELECT * FROM `users` WHERE `username`= ? AND  `passowrd` = ?";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $username);
        $fetch_res->bindvalue(2, $password);
        $fetch_res->execute();
        if ($fetch_res->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }else{
            return  false;
        }
    }


    /// get user information
    public function getUser ($username){
        $fetch_sql = "SELECT * FROM `users` WHERE `username`= ?";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $username);
        $fetch_res->execute();
        if ($infoUser = $fetch_res->fetch(PDO::FETCH_ASSOC)) {
            return $infoUser;
        }else{
            return  false;
        }
    }



    /// get user by token information
    public function getUserBytoken ($token){
        $fetch_sql = "SELECT * FROM `users` WHERE `token`= ?";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $token);
        $fetch_res->execute();
        if ($infoUser = $fetch_res->fetch(PDO::FETCH_ASSOC)) {
            return $infoUser;
        }else{
            return  false;
        }
    }

    /// change point and helth
    public  function changePoint ($token,$point,$health,$bestWeekPoint){
        $fetch_sql = "UPDATE `users` SET `point`=?,`weekPoint`=? ,`health`=?  WHERE `token`= ? ";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $point);
        $fetch_res->bindvalue(2, $bestWeekPoint);
        $fetch_res->bindvalue(3, $health);
        $fetch_res->bindvalue(4, $token);

        if ($fetch_res->execute()) {
            return true;
        }else{
            return  false;
        }
    }

    /// get best player
    public  function getPlayer (){
        $fetch_sql = "SELECT * FROM `users`  ORDER BY `point` DESC limit 9";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->execute();
        if ($user = $fetch_res->fetchAll()) {
            return $user;
        }else{
            return  false;
        }
    }

    /// add health
    public function addHealth ($token,$health){
        $fetch_sql = "UPDATE `users` SET `health`=?  WHERE `token`= ? ";
        $fetch_res = $this->connect->prepare($fetch_sql);
        $fetch_res->bindvalue(1, $health);
        $fetch_res->bindvalue(2, $token);

        if ($fetch_res->execute()) {
            return true;
        }else{
            return  false;
        }

    }
}

