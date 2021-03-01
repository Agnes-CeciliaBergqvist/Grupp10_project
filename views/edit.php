<!--This code should give us a new page with the message that we would like to edit-->
<link href="../CSS/style.css" rel="stylesheet" type="text/css"/>

<header id="header">

<div id="header-name">
  <h1>Millhouse</h1>  

  <div id="nav-bar">
    <a href="../views/homepage.php">Start</a>
    <a href="../views/posts.php">Create post</a>
    <a href="../views/viewPosts.php">Posts</a>
  </div>
</div> 
 
</header>

<?php 
session_start();
include("../includes/database_connection.php");
?>
<?php

//If the ID exsist change the whole row with this ID. 
if (isset($_GET['id'])) {
    
    $post_id = $_GET["id"];
    $stm = $db->query("SELECT * FROM posts WHERE id=$post_id");

    //Shows the old message?? But dosent work, the input fields is empty. 
    while($row = $stm->fetch())  {

        $title = $row['title'];
        $message = $row['message'];
        $category = $row['category'];
    }
    ?>
<!-- //Form for updating the exsisting post -->
<form method="POST" action ="../includes/handleEdit.php?">
<input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
<?php
        
    }

    if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
     ?>  
        <form method="POST" action ="../includes/handleEdit.php?">
        <input type="hidden" name="id" value="<?php echo $post_id; ?>"/><br />
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>"/><br />
        <label for="newMessage">Message:</label>
        <input type="textarea" name="newMessage" id="newMessage" value="<?php echo $message; ?>"/><br />
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" value="<?php echo $category; ?>" /><br />
        <input type="submit" name="edit_user" value="edit"> 
        </form>
    <?php
    }
    else {
        echo "You are not an admin so you can not edit posts!";
    }
    

 ?>
