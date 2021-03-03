<!--This page should delete the post if delete link is clicked-->
<?php
session_start();
include("../includes/database_connection.php");
?>
<?php

//If delete button is clicked that it will remove that ID
if (isset($_GET["delete_id"])) {
    $deleteID = $_GET['delete_id'];
    

    //Deleting comments from the post 
    $stmt = $db->query("DELETE FROM comments WHERE postId = $deleteID");
    if($stmt->execute()) {
    } else {
        echo "is not deleted";
    } 
    //Deleting the post and updating the database
    $stm = $db->query("DELETE FROM posts WHERE id = $deleteID");
    
    if($stm->execute()) {
        header("location:../views/viewPosts.php");
        echo "post with ['$deleteID'] is deleted";
    } else {
        echo "is not deleted";
    } 
}
?>