<?php
    $sql = "select * from `comments` where `postId` like '$_GET[post]'";
    $result = $connect->query($sql);
    foreach ($result as $key){
        echo 
        "<div class='display-post'>
            <h3>$key[content]</h3><div class='author-info'><p>$key[login]</p> <p>$key[pubDate]</p></div>
        </div>";
    }
?>