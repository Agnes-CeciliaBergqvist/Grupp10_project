<?php 
session_start();
include("../includes/database_connection.php");
?>
<?php

// $stm = $db->prepare("SELECT id, username, title, message, category FROM posts WHERE id=:id_IN");
// $stm->bindParam(":id_IN", $_GET['id']);


// if ($stm->execute() ) {

if (isset($_GET['id'])) {
    $post_id = $_GET["id"];

    $stm = $db->query("SELECT * FROM posts WHERE id=$post_id");
    
    while($row = $stm->fetch())  {
        $username = $row['username'];
    }
    // ?>

<form method="POST" action ="../includes/handleEdit.php?">
    <input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>"/><br />
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"/><br />
        <label for="newMessage">Message:</label>
        <input type="textarea" name="newMessage" id="newMessage" value="<?php echo $newMessage; ?>/><br />
        <label for="category">Category:</label>
        <input type="text" name="category" id="category"/><br />
    <input type="submit" name="edit_user" value="edit">

</form>
<?php
}
 ?>