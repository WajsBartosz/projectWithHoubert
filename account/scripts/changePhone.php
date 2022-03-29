<?php 
    session_start();
     //$_SESSION['login'] = login
    //$_SESSION['type'] = user/admin
    require_once('../../php/scripts/connect.php');
    $phone=$_POST['phone'];
    if(strlen($phone)!=9){
        header("location: ../editProfile.php");
    }else{
        $sql="update users set `phone` = '$phone' where `login` like '$_SESSION[login]'";
        $connect->query($sql);
        header("location: ../editProfile.php?changePhone=1");
    }
?>