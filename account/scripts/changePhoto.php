<?php
  session_start();
  require_once('../../php/scripts/connect.php');
  //$_SESSION['login'] = login
  //$_SESSION['type'] = user/admin 
  $img_tmp = $_FILES["userImage"]["tmp_name"];
  move_uploaded_file($img_tmp, "../../profilePictures/img.$_SESSION[login].jpg");
  $sql = "update `users` set `photoPath`='profilePictures/img.$_SESSION[login].jpg'";
  $connect->query($sql);
  header ("location: ../editProfile.php");
?>