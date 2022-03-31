<?php
    session_start();
    require_once('./connect.php');
    print_r($_POST);
    if($_POST['sendbutton']){
        $postID = $_POST['postID'];
        $commentContent = $_POST['commentContent'];
        $sql = "insert into `comments` (`postId`,`login`,`content`)
        values ('$postID','$_SESSION[login]','$commentContent')";
        $connect->query($sql);
        header("location: ../../post.php?post=$postID");
    }
?>