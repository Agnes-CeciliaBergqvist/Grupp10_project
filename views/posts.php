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

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_user_name'].'</h1>';
  echo '<h4><a href="../includes/handleLogout.php">Logout</a></h4>';

  // You are only able to make posts if you are logged in!
  echo '<form method="POST action="../includes/handleUpload" enctype="multipart/form-data">
          <input type="file" name="chosenImage"/><br />
          <input type="submit" value="Ladda upp!" />
        </form>';

  echo '<form action="../includes/handleposts.php" method="POST" align=center>
  <h2>Make your new blogpost here</h2>
  <label for="title">Title:</label>
  <input type="text" name="title">
  <h4>Message</h4>
  <textarea name="message" id="message" cols="50" rows="20"></textarea><br>
  <!--<label for="image">Image:</label>-->
  <!--<input type="image" alt="Choose"><br>-->
  <label for="category">Category:</label>
  <input type="text" name="category"><br>
  <!--<label for="date">Date:</label>-->
  <!--<input type="date" name="postdate"><br>-->
  <input type="submit" name="publishBtn" value="publish" id="">
</form>';


} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
}
?>



