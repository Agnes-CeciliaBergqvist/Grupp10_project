<?php
include("database_connection.php");
session_start();
$upload_dir = "images/";
$target_file = $upload_dir . basename($_FILES['chosenImage']['name']);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['publishBtn'])){

    $check = getimagesize($_FILES['chosenImage']['tmp_name']);
    if ($check == false) {
        echo "The file is not an image!";
        die;
    }
}
if(file_exists($target_file)){
    echo $target_file;
    echo "The file already exists!";
    die;
}

if($_FILES['chosenImage']['size']>10000000){
    echo "The file is to big!";
    die;
}

if($file_type != "png" && $file_type != "gif" && $file_type != "jpg" && $file_type != "jpng") {
    echo "You can only upload PNG, GIF, JPG or JPNG files!";
    die;
}

$msg =""; 
if(isset($_POST['publishBtn']) && move_uploaded_file($_FILES['chosenImage']['tmp_name'], $target_file)) {
    $username = $_SESSION['sess_user_name'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    
    //$date = $_POST['postdate'];

if($title != "" & $message != "" & $category != "") {

    $sql = "INSERT INTO posts (username, title, image, message, category) VALUES(:username_IN, :title_IN,:image_IN, :message_IN, :category_IN)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username_IN', $username);
    $stmt->bindParam(':title_IN', $title);
    $stmt->bindParam(':image_IN', $target_file);
    $stmt->bindParam(':message_IN', $message);
    $stmt->bindParam(':category_IN', $category);
    
    //$stmt->bindParam(':postdate_IN', $date);

    if($stmt->execute()){
        header("location:../views/viewPosts.php");
    }
}
else {
    $msg = "All fields are required! <a href='../views/posts.php'>Try again</a>";
    echo $msg;
    die;
}
}




?>