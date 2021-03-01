<!--This page shows all the posts that have been posted-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css"> 
    <title>Document</title>
</head>
<body>

<?php 
session_start();
include("../includes/database_connection.php");
echo "<h1 id='welcomeMessage'> You are logged in as " . $_SESSION['sess_user_name']. "! </h1>";

$stm = $db->query("SELECT id, userId, title, image, message, category, date  FROM posts");
echo "<div id='allPosts'>";

//Choosing the row with id and link to delete and edit with the bloggID=ID
while ($row = $stm->fetch()) {
    $blogg_id = $row['id'];
    
    echo "<div class ='entryWithComment'> <div class='blogEntries'> <p id='postId'> Post ID: " . $row['id'] . "</p> <p id='userId'> Publisher ID: " . $row['userId'] . "</p> <h2 id='entryTitle'> " . $row['title'] . '</h2> <p id="enrtyImage"><img src="../includes/' . $row['image'] . '" "height=200 width=300"/></p>' . "<p id='entryMessage'>" . $row['message'] . "</p> <p id='entryCategory'> " . $row['category'] . "</p> <p id='entryPublished'> Published: " . $row['date'] . " </p>" ;
    //Checks if you are logged in as a user or a admin
    if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){
    echo "<div class='adminBtns'> <a href='../includes/handleDelete.php?delete_id=$blogg_id'>Delete</a>" ;
    echo "<a href='../views/edit.php?id=$blogg_id'>Edit</a></div> </div>";  
    }
    echo "<div class='comments'> Here are the comments going to be ! </div> </div>";
}
echo "</div>"
?>

</body>
</html>