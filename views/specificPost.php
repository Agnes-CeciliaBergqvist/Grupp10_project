<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="CommentPage">
<?php 
include("../includes/database_connection.php");
session_start();

$id = $_GET['id'];
$stm = $db->query("SELECT id, userId, title, image, message, category, date FROM posts WHERE id = $id");
//echo "<div class ='entryWithComment'>";
while($row = $stm->fetch() ){
echo "<div class='blogEntries1'> <p id='postId'> Post ID: " . $row['id'] . "</p> <p id='userId'> Publisher ID: " . $row['userId'] . "</p> <h2 id='entryTitle'> " . $row['title'] . '</h2> <p id="enrtyImage"><img src="../includes/' . $row['image'] . '" "height=200 width=300"/></p>' . "<p id='entryMessage'>" . $row['message'] . "</p> <p id='entryCategory'> Category: " . $row['category'] . "</p> <p id='entryPublished'> Published: " . $row['date'] . " </p>" ;

echo "</div>";

}

echo "<div class ='entryWithComment'>";
?>
<div class='leaveAComment'> 
  <form action="../includes/handleComments.php<?php echo"?id=$id";?>" method="POST">
  <input type="button" name="commentBtn" id="commentBtn" value="Leave a comment" onclick="hide();"></br>
  <div id="textarea" style="display: none;">
  <textarea name="comment" id="commentArea" cols="30" rows="10"></textarea></br>
  <input type="submit" name="publishBtn" id="publishBtn" value="Publish" onsubmit="show();">
  </div>
  </form>  
  </div> </div>
  
  <div class="commentBox">
  
  <h2 class='Headline'>Comments:</h2>
  
<?php
$stmt = $db->query("SELECT id, postId, user_Id, message, date FROM comments WHERE postId = $id");
while($row = $stmt->fetch()) {
    echo "<div class='comments'> <p id='commentId'> Comment ID: " . $row['id'] . "</p> <p id='commentPostId'> Post ID: " . $row['postId'] . "</p><p id='usercomment'> By: " . $_SESSION['sess_user_name'] . "</p><h2 id='commentUserId'> " . $row['user_Id'] . "</h2><p id='commentMessage'>" . $row['message'] . "</p> <p id='commentDate'> Published: " . $row['date'] . "</p> </div>";
}
echo "</div>";

?>

  </div>
  <script>

var Btn = document.getElementById("commentBtn"); 
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

<h3><a href="../views/viewPosts.php">Back to all posts!</a></h3>

    
</body>
</html>
