<?php
  session_start();
  require_once ('../../scripts/connect.php');
  if(!$connect->connect_errno){
    $sql = "select * from `users`  where login like '$_POST[login]'";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result);
    
    //nie znaleziono loginu
    if($result->num_rows==0){
      $_SESSION['error']=1;
      header("location: ../user.php");
    }

    //złe hasło
    else if($row[1]!=$_POST['password']){
      $_SESSION['error']=2;
      header("location: ../user.php");
    }

    //pomyślnie zalogowano
    else{
      $_SESSION['login']=$_POST['login'];
      $_SESSION['type']=$row[2];
      $_SESSION['error']=0;
      header("location: ../../main.php");
    }
    $connect->close();

  }

  else{
    echo 'Błędne połączenie z bazą danych<br>Błąd: '.$connect->connect_errno;
  }

?>
