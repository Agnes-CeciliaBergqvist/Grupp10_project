<!DOCTYPE html>
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

$stm = $db->query("SELECT id, username, title, message, category  FROM posts");
echo "<pre>";
while ($row = $stm->fetch()) {
    echo $row['id'] . " " . $row['username'] . " " . $row['title'] . " " . $row['message'] . " " . $row['category'] . "<br />";
}
echo "</pre>";
?>
    
</body>
</html>