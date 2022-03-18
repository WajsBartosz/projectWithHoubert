<?php
  session_start();
  if(isset($_SESSION['login'])) header("location: ../account/profile.php");
  require_once ('../../php/scripts/connect.php');
  if(!$connect->connect_errno){
    $sql = "select * from `users`  where login like '$_POST[login]'";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result);
    
    $sha1pass = sha1($_POST['password']);

    //nie znaleziono loginu
    if($result->num_rows==0){
      $_SESSION['error']=1;
      header("location: ../login.php");
    }

    //złe hasło
    else if($row[1]!=$sha1pass){
      $_SESSION['error']=2;
      header("location: ../login.php");
    }

    //pomyślnie zalogowano
    else{
      $_SESSION['login']=$_POST['login'];
      $_SESSION['type']=$row[3];
      $_SESSION['error']=0;
      header("location: ../../index.php");
    }
    $connect->close();

  }

  else{
    echo 'Błędne połączenie z bazą danych<br>Błąd: '.$connect->connect_errno;
  }

?>
