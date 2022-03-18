<!doctype html>
<?php
  session_start();
  require_once('../php/scripts/connect.php');
  if(isset($_SESSION['login'])) header("location: ../account/profile.php");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='../style.css'>
    <link rel='stylesheet' href='./login.css'>
    <link rel="icon" type="image/x-icon" href="../images/bonfire.jpg">
    <title>Logowanie</title>
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
        <li class="nav-item">
          <a class="nav-link active" href="./login.php">Zaloguj się</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

 <div class="container-fluid" id='main'>
  <div class="row">
    <div class="col-sm" id='login'>
        <h2> Logowanie </h2><hr>
        <form action='./scripts/loginScript.php' method='post'>
            Login:<br>
            <input type='text' name='login' placeholder='login' required><br>
            Hasło:<br>
            <input type='password' name='password' placeholder='haslo' required><br>
            <input type='submit' value='zaloguj'>
          </form>
          <div id='loginError'>
          <?php
            if(isset($_SESSION['error'])){
              if($_SESSION['error']==1) echo "Nie znaleziono takiego loginu.";
              if($_SESSION['error']==2) echo "Podane hasło jest nieprawidłowe.";
            }
          ?>
          </div>
    </div>
    <div class="col-sm" id='login'>
        <h2> Rejestracja </h2><hr>
        <form action='./scripts/registerScript.php' method='post'>
            Email:<br>
            <input type='email' name='mail' placeholder='email' required><br>
            Login:<br>
            <input type='text' name='login' placeholder='login' required><br>
            Hasło:<br>
            <input type='password' name='password' placeholder='hasło' required><br>
            <h6 id='openPasswordReq' style='color:rgb(226, 189, 87); width:220px; margin:auto;'>Wymagania dotyczące hasła</h6>
            <div class='passwordReq' id='passwordReq'>
              min. 6 znaków<br>
              1 mała litera<br>
              1 duża litera<br>
              1 znak specjalny<br>
              1 cyfra
            </div>
            <div style='margin-top:30px;'>Powtórz hasło:<br></div>
            <input type='password' name='password1' placeholder='powtórz hasło' required><br>
            <input type='submit' value='zarejestruj'>
          </form>
          <div id='registerError'>
          <?php
            if(isset($_SESSION['error'])){
              if($_SESSION['error']==3) echo "Taki login już istnieje.";
              if($_SESSION['error']==4) echo "Taki Email już istnieje.";
              if($_SESSION['error']==5) echo "Hasło za krótkie.";
              if($_SESSION['error']==6) echo "Hasło nie spełnia wymagań.";
              if($_SESSION['error']==7) echo "Hasła nie są takie same.";
            }
          ?>

          </div>
    </div>
  </div>
 </div>

<footer>
    Wszelkie prawa zastrzeżone <b>Wajs Bartosz Przybyła Hubert</b> &copy
    </footer>
<script src='./scripts/script.js'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>