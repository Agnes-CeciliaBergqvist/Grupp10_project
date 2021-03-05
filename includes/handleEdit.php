<!--This code helps us to update the database with the new post from the edit page-->
<?php 
session_start();
include("../includes/database_connection.php");
?>


<?php 
//If edit is clicked it will save and update the input fields with this information
if (isset($_POST["edit_user"])) {
    $newMessage = $_POST["newMessage"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $id = $_POST["id"];
    $update = date("y-m-d h:i");

    //Update to the database with all the input fields
    $stm = $db->query("UPDATE posts SET message = '$newMessage', title = '$title', category ='$category', updated = '$update' WHERE id=$id");
    
    if($stm->execute()) {
        header("location:../views/viewPosts.php");
        
    } else {
        
        echo "Error, the post is not updated!";
    }
}
 ?>
