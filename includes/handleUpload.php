<?php 

$upload_dir = "images/";
$target_file = $upload_dir . basename($FILES['imageToUpload']['name']);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
?>