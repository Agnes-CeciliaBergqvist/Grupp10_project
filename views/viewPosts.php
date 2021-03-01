<!--This page shows all the posts that have been posted-->
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
session_start();
include("../includes/database_connection.php");
echo "You are logged in as " . $_SESSION['sess_user_name']. "!";

$stm = $db->query("SELECT id, userId, title, image, message, category, date  FROM posts");
echo "<pre>";

//Choosing the row with id and link to delete and edit with the bloggID=ID
while ($row = $stm->fetch()) {
    $blogg_id = $row['id'];

    //Checks if you are logged in as a user or a admin
    if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){
    echo "<a href='../includes/handleDelete.php?delete_id=$blogg_id'>Delete</a> <br>" ;
    echo "<a href='../views/edit.php?id=$blogg_id'>Edit</a> <br>";


    


    }
    echo "Post ID: " . $row['id'] . "<br>User ID: " . $row['userId'] . "<br> " . $row['title'] . '<br><img src="../includes/' . $row['image'] . '" "height=200 width=300"/> </br>' . $row['message'] . " " . $row['category'] . " Published: " . $row['date'] . "<br />" ;
    echo "</pre>";

    ?>



</body>
</html>