<?php
session_start();

session_destroy();
return header('location:../../auth/login.php');