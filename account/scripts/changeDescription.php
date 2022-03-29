<?php 
    session_start();
    //$_SESSION['login'] = login
    //$_SESSION['type'] = user/admin 
    require_once('../../php/scripts/connect.php');
    $description=mysqli_real_escape_string($connect, $_POST['description']);
    if(strlen($description)>300){
        header("location: ../editProfile.php?error=4");
    }else{
        $sql="update `users` set `description`='$description' where `login` like '$_SESSION[login]'";
        $connect->query($sql);
        header("location: ../editProfile.php?changeDescription=1");
    }

    


?>