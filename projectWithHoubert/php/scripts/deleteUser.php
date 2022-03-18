<?php 
    // not final version
    include "../connect.php";
    function deleteUser($login){
        $sql="DELETE FROM `users` WHERE `login`=$login";
        $connect->query($sql);
    }
    


?>