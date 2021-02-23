<?php
   include("database_connection.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

    $sql = "INSERT INTO users(username, email, password) VALUES(:username_IN, :email_IN, :password_IN)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':username_IN',$username);
    $stm->bindParam(':email_IN',$email);
    $stm->bindParam(':password_IN',$password);
    
    if($stm->execute()) {
        header("location:../views/login.php");
    }
    else {
        echo "Det gick fel!";
    } 

?>