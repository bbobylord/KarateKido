<?php

include '../../dataBase/userClass.php';
$query = new User();
$cof = $query->getConfig();
$time = (int)$cof['T'];
$changeTime = $time == 0 ? 1 : 0;


$query->changeConfig($changeTime);


var_dump($changeTime);
