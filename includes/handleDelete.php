<?php
session_start();
include("../includes/database_connection.php");
?>
<?php

if (isset($_GET["delete_id"])) {
    $deleteID = $_GET['delete_id'];
    
    $stm = $db->query("DELETE FROM posts WHERE id = $deleteID");
    
    if($stm->execute()) {
        header("location:../views/viewPosts.php");
        echo $deleteID . "is deleted";
    } else {
        echo "is not deleted";
    } 
}
?>