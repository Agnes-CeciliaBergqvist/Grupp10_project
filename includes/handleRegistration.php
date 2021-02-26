<?php
include("database_connection.php");


$msg ="";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$salt1 = "AfGsaö2";
$salt2 = "Hasf&6";
$krypt_password = md5($salt2.$password.$salt1);



    $sql = "INSERT INTO users(username, email, password) VALUES(:username_IN, :email_IN, :password_IN)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':username_IN',$username);
    $stm->bindParam(':email_IN',$email);
    $stm->bindParam(':password_IN',$krypt_password);

    if($username != "" & $email != "" & $password != ""){
        $stm->execute();
        header("location:../views/login.php");
    }
    else {
        echo $msg = "All fields are required for registration, try again!";
        echo '<h4><a href="../views/registration.php">Back to registration!</a></h4>';
    }

?>