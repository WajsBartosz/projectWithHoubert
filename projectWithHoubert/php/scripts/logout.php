<?php
    session_start();
    //unset($_SESSION['login']);
    //unset($_SESSION['type']);
    //unset($_SESSION['error']);
    session_destroy();
    header("location:../../index.php")
?>