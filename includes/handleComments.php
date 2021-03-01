<?php 
include("database_connection.php");
session_start();

if(isset($_POST['publishBtn'])) {

    $userId = $_SESSION['sess_user_id'];
    $message = $_POST['comment']; 
    $date = date('d-m-y h:i:s');
    $postId = $_GET['id'];
    
}

if ($message != "") {

    $sql = "INSERT INTO comments (postId, userId, message, date) VALUES(:postId_IN, :userId_IN, :message_IN, :date_IN)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':postId_IN',$postId);
    $stm->bindParam(':userId_IN',$userId);
    $stm->bindParam(':message_IN',$message);
    $stm->bindParam(':date_IN',$date);

    if($stm->execute()) {
        header("location:../views/viewPosts.php");
    }
}
else {
    echo "Please dont leave an empty comment!";
}



?>