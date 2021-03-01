<?php 
include("database_connection");
session_start();

if(isset($_POST['publishBtn'])) {
    $userId = $_SESSION['sess_user_id'];
    $message = $_POST['comment']; 
    $date = date('d-m-y h:i:s');

}

if ($message != "") {

    $sql = "INSERT INTO comments (postId, user_Id, date, message) VALUES(:postId_IN, :user_Id_IN, :date_IN, :message_IN)";
    $stmt = $db->prepare($sql);

    
}



?>