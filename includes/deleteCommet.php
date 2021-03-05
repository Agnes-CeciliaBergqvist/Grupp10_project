<?php
session_start();
include("../includes/database_connection.php");

// removes comment 


$id = $_GET['id'];
$delete_comment = $_GET['userDeleteComment_id'];

$userId = $_SESSION['sess_user_id'];

if (isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){
    $adminCommentId = $_GET['adminDeleteComment_id'];

    $stm = $db->query("DELETE FROM comments WHERE commentId = $adminCommentId");
    if($stm->execute()) {
        header("location:../views/specificPost.php?id=$id");
        echo "Comment with ['$adminCommentId'] is deleted";
    }


} else {

    $stm = $db->query("DELETE FROM comments WHERE commentId = $delete_comment");

    if($stm->execute()) {
        header("location:../views/specificPost.php?id=$id");
    }
}



?>