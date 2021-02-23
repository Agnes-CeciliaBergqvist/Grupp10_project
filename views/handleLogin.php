<?php 
session_start();
$db = new PDO('mysql:host=localhost;dbname=Millhouse;charset=utf8mb4', 'root', '');
?>
<?php
$msg ="";
if(isset($_POST['loginBtn'])){
    $username= trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username != "" & $password != "" ){
        try {
            $query = "SELECT * FROM `users` where `username` =:username_IN and `password`=:password_IN";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username_IN', $username);
            $stmt->bindValue('password_IN', $password);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch();

            
                if($count == 1 && !empty($row)) {
        
                    $_SESSION['sess_user_id'] = $row['id'];
                    $_SESSION['sess_user_name'] = $row['username'];
                    $_SESSION['sess_email'] = $row['email'];
                    header("location:homepage.php");
                }
                else {
                    $msg = "Invalid username or password! <br>";
                    echo $msg . "<a href='login.php'> Try again </a>";
                }
    }
        catch(PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
       
    }
    else {
        $msg = "Both fields are required! <br>";
        echo $msg . "<a href='login.php'> Try again </a>";
    }
}
?>