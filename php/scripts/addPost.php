<?php
    session_start();
    require_once("./connect.php");
    print_r($_POST);
    if($_POST['sendbutton']){
        $sectionID = $_POST['sectionID'];
        $topic = $_POST['postTopic'];
        $content = $_POST['postContent'];
        $sql = "insert into `posts` (`sectionId`,`author`,`subject`,`content`)
        values ('$sectionID','$_SESSION[login]','$topic','$content')";
        $connect->query($sql);
        header("location: ../../forum.php?section=$sectionID");
    }
?>