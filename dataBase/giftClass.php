<?php


class giftClass
{
    public $connect;
    function __construct() {

        $this->connect = $GLOBALS['connection'];
    }


    ///get Gift
    public function getGift (){
        $fetch_sql = "SELECT * FROM `gift` ";
        $fetch_res = $this->connect->prepare($fetch_sql);

        $fetch_res->execute();
        if ($gift = $fetch_res->fetch()) {
            return $gift;
        }else{
            return  false;
        }
    }
}