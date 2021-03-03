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
<?php 
include("../includes/database_connection.php");


$id = $_GET['id'];
$stm = $db->query("SELECT id, userId, title, image, message, category, date FROM posts WHERE id = $id");
echo "<div class ='entryWithComment'>";
while($row = $stm->fetch() ){
echo "<div class='blogEntries'> <p id='postId'> Post ID: " . $row['id'] . "</p> <p id='userId'> Publisher ID: " . $row['userId'] . "</p> <h2 id='entryTitle'> " . $row['title'] . '</h2> <p id="enrtyImage"><img src="../includes/' . $row['image'] . '" "height=200 width=300"/></p>' . "<p id='entryMessage'>" . $row['message'] . "</p> <p id='entryCategory'> " . $row['category'] . "</p> <p id='entryPublished'> Published: " . $row['date'] . " </p>" ;


}

$stmt = $db->query("SELECT id, postId, userId, message, date FROM comments WHERE postId = $id");
while($row = $stmt->fetch()) {
    echo "<div class='comments'> <p id='commentId'> Comment ID: " . $row['id'] . "</p> <p id='commentPostId'> Post ID: " . $row['postId'] . "</p> <h2 id='commentUserId'> " . $row['userId'] . "</h2><p id='commentMessage'>" . $row['message'] . "</p> <p id='commentDate'> " . $row['date'] . "</p> </div>";
}
echo "</div>";

?>

<div class='leaveAComment'> 
  <form action="../includes/handleComments.php<?php echo"?id=$id";?>" method="POST">
  <input type="button" name="commentBtn" id="1" value="Leave a comment" onclick="hide();"></br>
  <div id="textarea" style="display: none;">
  <textarea name="comment" id="" cols="30" rows="10"></textarea></br>
  <input type="submit" name="publishBtn" id="publishBtn" value="Publish" onsubmit="show();">
  </div>
  </form>  
  </div> </div>

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
    
</body>
</html>
