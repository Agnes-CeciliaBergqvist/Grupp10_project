<!--This page shows all the posts that have been posted-->
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css"> 
    <title>Document</title>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>

  <header id="header">

    <div id="header-name">
     <h1>Millhouse</h1>  

        <div id="nav-bar">
         <a href="../views/homepage.php">Start</a>
         
        </div>
    </div> 

</header>   

<?php 
session_start();
include("../includes/database_connection.php");
echo "<h1 id='welcomeMessage'> You are logged in as " . $_SESSION['sess_user_name']. "! </h1>";

$stm = $db->query("SELECT id, userId, title, image, message, category, date  FROM posts");
echo "<div id='allPosts'>";

//Choosing the row with id and link to delete and edit with the bloggID=ID
while ($row = $stm->fetch()) {
    $postId = $row['id'];
    
    echo "<div class ='entryWithComment'> <div class='blogEntries'> <p id='postId'> Post ID: " . $row['id'] . "</p> <p id='userId'> Publisher ID: " . $row['userId'] . "</p> <h2 id='entryTitle'> " . $row['title'] . '</h2> <p id="enrtyImage"><img src="../includes/' . $row['image'] . '" "height=200 width=300"/></p>' . "<p id='entryMessage'>" . $row['message'] . "</p> <p id='entryCategory'> " . $row['category'] . "</p> <p id='entryPublished'> Published: " . $row['date'] . " </p>" ;
    //Checks if you are logged in as a user or a admin
    if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){
    echo "<div class='adminBtns'> <a href='../includes/handleDelete.php?delete_id=$postId'>Delete</a>" ;
    echo "<a href='../views/edit.php?id=$postId'>Edit</a></div>";  
    }
    
   
    ;
  
    ?>
    <div class='leaveAComment'> 
    <form action="../includes/handleComments.php<?php echo"?id=$postId";?>" method="POST">
    <input type="button" name="commentBtn" id="1" value="Leave a comment" onclick="hide();"></br>
    <div id="textarea" style="display: none;">
    <textarea name="comment" id="" cols="30" rows="10"></textarea></br>
    <input type="submit" name="publishBtn" id="publishBtn" value="Publish" onsubmit="show();">
    </div>
    </form>  
    </div> </div>

<?php
    echo "</div>";
    ?>
    
<script>

var Btn = document.getElementById("1"); 
var Comment = document.getElementById("textarea");

function hide() {
    if (Btn.style.display === "none") {
    Btn.style.display = "block";
    Comment.style.display = "none";
  } else {
    Btn.style.display = "none";
    Comment.style.display = "block";
  }
}

function show(){
  
    if (Comment.style.display === "none") {
    Comment.style.display = "block";
    Btn.style.display = "none";
  } else {
    Comment.style.display = "none";
    Btn.style.display = "block";

  }

}
</script>
    <?php
     echo "<div class='commentBox'>";
    
    $stmt = $db->query("SELECT id, postId, user_Id, message, date FROM comments WHERE postId = $postId");
    while ($comRow = $stmt->fetch()) {
      echo "<div class='comments'> <p id='commentId'> Comment ID: " . $comRow['id'] . "</p> <p id='commentPostId'> Post ID: " . $comRow['postId'] . "</p> <h2 id='commentUserId'> " . $comRow['user_Id'] . "</h2><p id='commentMessage'>" . $comRow['message'] . "</p> <p id='commentDate'> " . $comRow['date'] . "</p> </div>";
    }
   echo "</div>";
   
  }
  echo "</div>";
?>

</body>
</html>