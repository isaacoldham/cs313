<?php
    session_start();
    session_destroy();
    header("Location: https://floating-skis.herokuapp.com/SeniorProject/login.php");
    die();
?>