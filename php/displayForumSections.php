<?php
    require_once('scripts/connect.php');
    $sql = 'select * from `sections`';
    $result = $connect->query($sql);
    foreach($result as $key){
?>
<div class='forumSections'>
    <div class='singleSection'>
        <div class='leftSide'>
            <?php echo "<a href='forum.php?section=$key[id]'>$key[name]</a>"?>
            
        </div>
        <div class='rightSide'>
            <?php 
                $sql="select * from `posts`
                where `sectionId`=$key[id]
                order by `publicationDate` desc
                limit 1;";
                $result1=$connect->query($sql);
                $latestPost=$result1->fetch_assoc();
                echo "$latestPost[subject]";
            ?>
        </div>
    </div>
</div>

<?php } ?>
