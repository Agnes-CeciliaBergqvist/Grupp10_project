<?php 

$upload_dir = "images/";
$target_file = $upload_dir . basename($_FILES['chosenImage']['name']);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['uploadImageBtn'])){
    $check = getimagesize($_FILES['chosenImage']['tmp_name']);
    if ($check == false) {
        echo "The file is not an image!";
        die;
    }
}
if(file_exists($target_file)){
    echo "The file already exists!";
    die;
}

if($_FILES['chosenImage']['size']>500000){
    echo "The file is to big!";
    die;
}

if($file_type != "png" && $file_type != "gif" && $file_type != "jpg" && $file_type != "jpng") {
    echo "You can only upload PNG, GIF, JPG or JPNG files!";
    die;
}

if(move_uploaded_file($_FILES['chosenImage']['tmp_name'], $target_file)) {
    include("database_connection.php");

    $sql = "INSERT INTO images (path) VALUES('$target_file')";
    $stm = $db->prepare($sql);

    if($stm->execute()) {
        header("location:../views/posts.php");
        echo "<img src=".$target_file." height=200 width=300 />";
    }
    else{
        echo "Something went wrong!";
    }
}
else {
    echo "Something went wrong!";
}
?>