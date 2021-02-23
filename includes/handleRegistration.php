<?php
   include("database_connection.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$md5_password = md5($password);

    $sql = "INSERT INTO users(username, email, password) VALUES(:username_IN, :email_IN, :password_IN)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':username_IN',$username);
    $stm->bindParam(':email_IN',$email);
    $stm->bindParam(':password_IN',$md5_password);
    
    if($stm->execute()) {
        header("location:../views/login.php");
    }
    else {
        echo "Det gick fel!";
    } 

?>