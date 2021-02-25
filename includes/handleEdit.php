<?php 
session_start();
include("../includes/database_connection.php");
?>


<?php 
if (isset($_POST["edit_user"])) {
    $newMessage = $_POST["newMessage"];
    $title = $_POST["title"];
    $id = $_POST["id"];

    
    $stm = $db->query("UPDATE posts SET message = '$newMessage', title = '$title' WHERE id=$id");
    
    if($stm->execute()) {
        header("location:../views/viewPosts.php");
        
    } else {
        
        echo "Error, the post is not updated!";
    }
}
 ?>