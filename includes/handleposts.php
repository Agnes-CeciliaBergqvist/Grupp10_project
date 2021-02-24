<?php
 include("../includes/database_connection.php");

$msg =""; 
if(isset($_POST['publishBtn'])) {
    $titel = $_POST['titel'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    //$date = $_POST['postdate'];

if($titel != "" & $description != "" & $category != "") {

$sql = "INSERT INTO posts (titel, description, category) VALUES(:titel_IN, :description_IN, :category_IN)";
$stmt = $db->prepare($sql);

$stmt->bindParam(':titel_IN', $titel);
$stmt->bindParam(':description_IN', $description);
$stmt->bindParam(':category_IN', $category);
//$stmt->bindParam(':postdate_IN', $date);

if($stmt->execute());{
    header("location:homepage.php");


}
//else {
    //$msg = "All fields are required! Try again";
    //echo $msg;
    

}}

?>