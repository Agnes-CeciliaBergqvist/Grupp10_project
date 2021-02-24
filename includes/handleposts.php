<?php
include("database_connection.php");

session_start();

$msg =""; 
if(isset($_POST['publishBtn'])) {
    $username = $_SESSION['sess_user_name'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    //$date = $_POST['postdate'];

if($title != "" & $message != "" & $category != "") {

    $sql = "INSERT INTO posts (username, title, message, category) VALUES(:username_IN, :title_IN, :message_IN, :category_IN)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username_IN', $username);
    $stmt->bindParam(':title_IN', $title);
    $stmt->bindParam(':message_IN', $message);
    $stmt->bindParam(':category_IN', $category);
    //$stmt->bindParam(':postdate_IN', $date);

    if($stmt->execute());{
        header("location:../views/homepage.php");
    }
}
else {
    $msg = "All fields are required! <a href='../views/posts.php'>Try again</a>";
    echo $msg;
}
}

?>