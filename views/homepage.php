<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>

    
</head>
<body>

<header id="header">

    <div id="header-name">
      <h1>Millhouse</h1>  
    
      <div id="nav-bar">
        <a href="../views/homepage.php">Start</a>
        <a href="../views/login.php">Login</a>
        <a href="../views/viewPosts.php">Posts</a>
      </div>
    </div> 
     
</header>


<?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_user_name'].'</h1>';

  if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
    echo "Du är inloggad som <b>Admin</b><br />";

    echo 'Do you want to publish something? <a href="posts.php">Click here!</a> <br>';
  }
    echo 'Do you want to see all existing posts? <a href="viewPosts.php">Click here!</a>';
        


  echo '<h4><a href="../includes/handleLogout.php">Logout</a></h4>';
} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
}
?>
   
</body>
</html>