<?php
    $sql = "select * from `posts` where `sectionId` like '$_GET[section]' order by `publicationDate` desc";
    $result = $connect->query($sql);

    foreach($result as $key){
    echo 
    "<div class='display-post'>
        <a href='./post.php?post=$key[id]'><h2>$key[subject]</h2></a> <div class='author-info'><p>$key[author]</p> <p>$key[publicationDate]</p></div>
    </div>";

    }
?>