<!doctype html>
<?php
  session_start();
  require_once('./php/scripts/connect.php')
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='./style.css'>
    <link rel="icon" type="image/x-icon" href="images/bonfire.jpg">
    <title>Strona główna</title>
  </head>

  <body>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color:rgb(33,37,41); padding-bottom:0px; padding-top:0px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src='images/logo.png' width=200px></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Strona główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./loginsystem/login.php">Konto</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <div id='main'>

</div>

    <footer>
    Wszelkie prawa zastrzeżone <b>Wajs Bartosz Przybyła Hubert</b> &copy
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>
