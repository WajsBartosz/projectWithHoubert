<!doctype html>
<?php
  session_start();
  //$_SESSION['login'] = login
  //$_SESSION['type'] = user/admin 
  require_once('../php/scripts/connect.php');
  if(!isset($_SESSION['login'])) header("location: ../index.php")
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='../style.css'>
    <link rel='stylesheet' href='./profile.css'>
    <link rel="icon" type="image/x-icon" href="../images/bonfire.jpg">
    <title>Edytuj profil</title>
  </head>

  <body>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color:rgb(47,52,56); padding-bottom:0px; padding-top:0px; position:sticky; top: 0; z-index:2;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src='../images/logo.png' width=200px></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Strona główna</a>
        </li>
        <?php if(isset($_SESSION['login'])){
          echo "<li class=nav-item>
            <a class='nav-link active' href=./profile.php>Witaj, $_SESSION[login]</a>
          </li>";
        }else{
          echo "<li class=nav-item>
            <a class=nav-link href=./loginsystem/login.php>Zaloguj się</a>
          </li>";
        }?>

        <?php
        if(isset($_SESSION['login'])){
        echo <<<logout
        <li class="nav-item">
          <a class="nav-link" href="../php/scripts/logout.php">Wyloguj się</a>
        </li>
logout;
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <div id='main'>
    <?php 

    ?>
    <div id='top'>
      <h1><p id="info">Edycja profilu</p></h1>
      <?php 
            if(isset($_GET['error'])){
                if($_GET['error']==1){
                    echo "<script>alert('Podaj poprawne hasło!');</script>";
                }
                if($_GET['error']==2){
                    echo "<script>alert('Podaj poprawny adres e-mail!');</script>";  
                }
                
            }
        ?>
      <hr>
        <div class='changeLabel'>Zmień adres e-mail:</div>
           <div class='changeDiv'>
            <form action='./scripts/changeMail.php'  method='post'>
                <label>Podaj nowy mail:</label><br>
                    <input type='mail' name='email'><br>
                <label>Podaj hasło:</label><br>
                    <input type='password' name='password'><br><br>
                <input type='submit' value='zmień mail' class='button'>
            </form>
           </div>
        <div class='changeLabel'>Zmień hasło</div>
          <div class='changeDiv'>
            <form action='./scripts/changePassword.php'  method='post'>
                <label>Podaj aktualne hasło</label><br>
                    <input type='password' name='oldPass'><br>
                <label>Podaj hasło:</label><br>
                    <input type='password' name='newPass'><br>
                <label>Podaj hasło ponownie:</label><br>
                    <input type='password' name='newPassRep'><br><br>
                <input type='submit' value='zmień hasło' class='button'>
            </form>
           </div>
          <div class='changeLabel'>Zmień opis</div>
            <div class='changeDiv'>
              <form action='./scripts/changeDescription.php' method='POST'>
                <textarea id='description' name='description'></textarea><br>
                <input type='submit' value='zmień opis' class='button'>
              </form>
          </div>
          <div class='changeLabel'>Zmień zdjęcie</div>
            <div class='changeDiv'>
              <form action='./scripts/changePhoto.php' method='POST' enctype="multipart/form-data">
              <label>Zmień zdjęcie:</label>
              <input type='file' name='userImage'>
              <input type='submit' value='zmień zdjęcie' class='button'>
            </div>
      </div>
  </div>

    <footer>
    Wszelkie prawa zastrzeżone <b>Wajs Bartosz Przybyła Hubert</b> &copy
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
<script src='./scripts/showEdits.js'></script>
</body>
</html>
