<?php
    
    $dsn = "mysql:host=localhost;dbname=Millhouse";
    $user="root";
    $password = "";
    
    $pdo = new PDO($dsn, $user, $password);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];



    $sql = "INSERT INTO users(username, email, password) VALUES(:username_IN, :email_IN, :password_IN";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':username_IN',$username);
    $stm->bindParam(':email_IN',$email);
    $stm->bindParam(':password_IN',$password);
    
    
    if($stm->execute()) {
        header("location:login.php");
    }
    else {
        echo "Det gick fel!";
    } 

?>