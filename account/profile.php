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
    <title>Profil</title>
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
        $sql="select * from `users` where `login` like '$_SESSION[login]'";
        $result=$connect->query($sql);
        $accountInformation=$result->fetch_assoc();
        $sql="select count(`id`) as `number` from `posts` where `author` like '$_SESSION[login]'";
        $result=$connect->query($sql);
        $numberOfPosts=$result->fetch_assoc();
        if($numberOfPosts['number']==0 or $numberOfPosts['number']>4){
            $postVariety="postów";
        }else if($numberOfPosts['number']==1){
            $postVariety="post";
        }else if($numberOfPosts['number']>1 && $numberOfPosts['number']<=4){
            $postVariety="posty";
        }
        if($accountInformation['accType']=="user"){
            $accType="Użytkownik";
        }else if($accountInformation['accType']=="admin"){
            $accType="Administrator";
        }

    ?>
        <div id="top">
            <h1><p id="info">Informacje o twoim koncie</p></h1>
            <hr>
            <?php if($accountInformation['photoPath']!=NULL){
                echo "<img src=../$accountInformation[photoPath] class=profilePicture>";
            }?>
            <p class="topParagraphs">Login: <?php echo "$accountInformation[login]";?></p>
            <p class="topParagraphs">E-Mail: <?php echo "$accountInformation[mail]";?></p>
            <p class="topParagraphs">Typ konta: <?php echo "$accType";?></p>
        </div>
        <div id="bottom">
            <p class="bottomParagraphs">Opis: <?php if($accountInformation['description']==NULL){
                echo "nie masz jeszcze opisu";
            }else{
                echo "$accountInformation[description]";}?></p>
            <p class="bottomParagraphs">Kraj: <?php if($accountInformation['country']!=NULL) echo "$accountInformation[country]";?></p>
            <p class="bottomParagraphs">Numer telefonu: <?php if($accountInformation['country']!=NULL) echo "$accountInformation[phone]";?></p>
            <p class="bottomParagraphs">Do teraz opublikowałeś <?php echo "$numberOfPosts[number] $postVariety"; ?></p>
        </div>
        <p id="editInfo"><a id="info" href="./editProfile.php">Edytuj profil</a></p>
</div>

    <footer>
    Wszelkie prawa zastrzeżone <b>Wajs Bartosz Przybyła Hubert</b> &copy
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>
