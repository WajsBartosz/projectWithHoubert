<?php
  session_start();
  if(isset($_SESSION['login'])) header("location: ../account/profile.php");
  require_once ('../../php/scripts/connect.php');
  if(!$connect->connect_errno){
    $sql = "select * from `users`";
    $result = $connect->query($sql);

    $_SESSION['error']=0;

    //taki login już istnieje
    foreach($result as $user){
      if($user['login']==$_POST['login']){
         $_SESSION['error']=3;
         header("location: ../login.php");
      }
    }
    
    //taki email już istnieje
    foreach($result as $user){
      if($user['mail']==$_POST['mail']){
         $_SESSION['error']=4;
         header("location: ../login.php");
      }
    }

    //hasło za krótkie
    if(strlen($_POST['password'])<6){
      $_SESSION['error']=5;
      header("location: ../login.php");
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
      echo "6";
      header("location: ../login.php");
    }

    echo $_POST['password']." ".$_POST['password1']."<br>";
    //hasła nie są takie same
    if($_POST['password']!=$_POST['password1']){
      $_SESSION['error']=7;
      echo "7";
      header("location: ../login.php");
    }

    $sha1pass = sha1($_POST['password']);

    if($_SESSION['error']==0){
      $sql="insert into `users` (`login`,`password`,`mail`,`accType`) values ('$_POST[login]','$sha1pass','$_POST[mail]','1')";
      $connect -> query($sql);
      header("location: ../../index.php");
      $_SESSION['login']=$_POST['login'];
      $_SESSION['type']=1;
    }
  }

  else{
    echo 'Błędne połączenie z bazą danych<br>Błąd: '.$connect->connect_errno;
  }

?>
