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
            siema
        </div>
    </div>
</div>

<?php } ?>
