<?php

//session_start();


if (!isset($_SESSION['username'])) {
   header("Location: login.php");

   exit;
} else {

    echo 'Welcoom '. $_SESSION['username'];

    if ((time()-$_SESSION['timelogaout'])>900){

        header("Location: logout.php");
    }
    $_SESSION['timelogaout'] =time();

    $level = $_SESSION['level'];
}