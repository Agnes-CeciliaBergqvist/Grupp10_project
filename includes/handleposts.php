<?php


include("database_connection.php");
session_start();

// code to handle the image file!
$upload_dir = "images/";
$file_type = strtolower(pathinfo(basename($_FILES['chosenImage']['name']), PATHINFO_EXTENSION));
$target_file = $upload_dir . basename(md5(date('d-m-y h:i:s'))). "." .$file_type;


if(isset($_POST['publishBtn'])){

    $check = getimagesize($_FILES['chosenImage']['tmp_name']);
    //checking if the the file that was put in is an image or not
    if ($check == false) {
        echo "The file is not an image!";
        die;
    }
}
//checking if image already exists!
if(file_exists($target_file)){
    echo $target_file;
    echo "The file already exists!";
    die;
}
// restricting image from beeing to big!
if($_FILES['chosenImage']['size']>1000000){
    echo "The file is to big!";
    die;
}
//checking that image file only has endings (like .jpeg) that we allow!
if($file_type != "png" && $file_type != "gif" && $file_type != "jpg" && $file_type != "jpng") {
    echo "You can only upload PNG, GIF, JPG or JPNG files!";
    die;
}

$msg =""; 

// adding all the inputfields as variables / then to be added to the database
if(isset($_POST['publishBtn']) && move_uploaded_file($_FILES['chosenImage']['tmp_name'], $target_file)) {
    $userId = $_SESSION['sess_user_id'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    $date = date('y-m-d h:i:s');
    
    
// checking that input fields arent empty
if($title != "" & $message != "" & $category != "") {

    $sql = "INSERT INTO posts (userId, title, image, message, category, date) VALUES(:userId_IN, :title_IN,:image_IN, :message_IN, :category_IN, :date_IN)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':userId_IN', $userId);
    $stmt->bindParam(':title_IN', $title);
    $stmt->bindParam(':image_IN', $target_file);
    $stmt->bindParam(':message_IN', $message);
    $stmt->bindParam(':category_IN', $category);
    $stmt->bindParam(':date_IN', $date);
    
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