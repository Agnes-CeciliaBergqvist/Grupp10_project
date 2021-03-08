<?php 
include("database_connection.php");
session_start();
//checks if the publish button is pressed!
if(isset($_POST['publishBtn'])) {

    $userId = $_SESSION['sess_user_id'];
    $message = $_POST['comment']; 
    $date = date('y-m-d h:i:s');
    $id = $_GET['id'];
    
}
//checks that all inputs are filled in and then sends information to the database
if ($message != "") {

    $sql = "INSERT INTO comments (postId, userId, message, date) VALUES(:postId_IN, :userId_IN, :message_IN, :date_IN)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':postId_IN',$id);
    $stm->bindParam(':userId_IN',$userId);
    $stm->bindParam(':message_IN',$message);
    $stm->bindParam(':date_IN',$date);
    // if everything is fine the publisher is redirected to the same page but with the comment added!
    if($stm->execute()) {
        header("location:../views/specificPost.php?id=$id");
    }
}
else {
    echo "Please dont leave an empty comment!";
}



?>