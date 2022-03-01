<?php
  session_start();
  require_once ('../../scripts/connect.php');
  if(!$connect->connect_errno){
    $sql = "select * from `users`";
    $result = $connect->query($sql);

    //hasło za krótkie
    if(strlen($_POST['password'])<6){
      $_SESSION['error']=5;
      header("location: ../user.php?registration=1");
    }

    //wymagania dotyczące znaków
    $bigLetter = 0;
    $smallLetter = 0;
    $number = 0;
    $special = 0;

    for($i=0; $i<strlen($_POST['password']); $i++){
      if($_POST['password'][$i]>='a' and $_POST['password'][$i]<='z')
        $smallLetter = 1;
      if($_POST['password'][$i]>='A' and $_POST['password'][$i]<='Z')
        $bigLetter = 1;
      if($_POST['password'][$i]>='0' and $_POST['password'][$i]<='9')
        $number = 1;
      if(($_POST['password'][$i]>='!' and $_POST['password'][$i]<='/') or ($_POST['password'][$i]>=':' and $_POST['password'][$i]<='@') or ($_POST['password'][$i]>='{' and $_POST['password'][$i]<='~') or ($_POST['password'][$i]>='[' and $_POST['password'][$i]<='`'))
        $special = 1;
    }
    
    //hasło nie ma wymaganych znaków
    if($bigLetter!=1 or $smallLetter!=1 or $number!=1 or $special!=1){
      $_SESSION['error']=6;
      header("location: ../user.php?registration=1");
    }

    //hasła nie są takie same
    if($_POST['password']!=$_POST['password1']){
      $_SESSION['error']=4;
      header("location: ../user.php?registration=1");
    }

    //taki login już istnieje
    foreach($result as $user){
      if($user['login']==$_POST['login']){
        $_SESSION['error']=3;
        header("location: ../user.php?registration=1");
      }
    }

    if($_SESSION['error']==0){
      $sql="insert into `users` (`login`,`password`,`type`) values ('$_POST[login]','$_POST[password]','1')";
      $connect -> query($sql);
      header("location: ../../main.php");
      $_SESSION['login']=$_POST['login'];
      $_SESSION['type']=1;
    }
  }

  else{
    echo 'Błędne połączenie z bazą danych<br>Błąd: '.$connect->connect_errno;
  }

?>
