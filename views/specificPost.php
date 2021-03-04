<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
    <script src="../JavaScript/Js.js" defer></script>
</head>
<body>
  <header id="header">

    <div id="header-name">
    
      <h1 id="h1">Millhouse <i class="fab fa-slack"></i></h1>  
      

      <div class="container test">
        
        
        <div id="nav-bar">
          <ul>
            <a class="nav-bar-b" href="javascript:void(0);" class="icon">
              <i class="fa fa-bars"></i>
            </a>
          </ul>
            <div class="container hidden">

              <ul>
                <a class="nav-bar-a" href="../views/homepage.php">Start</a>
                <a class="nav-bar-a" href="../views/login.php">Login</a>
                <a class="nav-bar-a" href="../views/viewPosts.php">Posts</a>
              </ul>
            </div>

        </div> <!-- #nav-bar -->      
      </div> <!-- .container -->
    </div> <!-- #header-name -->
    <h4 class="logoutPosts"><a href="../includes/handleLogout.php">Logout</a></h4>
  </header>
 <main id="CommentPage">
<?php 
include("../includes/database_connection.php");
session_start();

$id = $_GET['id'];
$stm = $db->query("SELECT * FROM posts WHERE id = $id");
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

$stmt = $db->query("SELECT commentId, postId, userId, message, username, date FROM comments
                    JOIN users AS u ON comments.commentId = u.id 
                    WHERE postId = $id ORDER BY date DESC");

while($row = $stmt->fetch()) {
    echo "<div class='comments'> <p id='commentId'> Comment ID: " . $row['commentId'] . "</p> <p id='commentPostId'> Post ID: " . $row['postId'] . "</p><p id='usercomment'> By: " . $row['username'] . "</p><h2 id='commentUserId'> " . $row['userId'] . "</h2><p id='commentMessage'>" . $row['message'] . "</p> <p id='commentDate'> Published: " . $row['date'] . "</p> </div>";

  $adminCommentId = $row['commentId'];
  $userCommentId = $row['commentId'];
    
    if (isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){ 

      echo "<div class='deleteComment'><a href='../includes/deleteCommet.php?id=$id&adminDeleteComment_id=$adminCommentId'>Delete</a></div>";
      
    }else if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] == $row['userId']){

      echo "<div><a href='../includes/deleteCommet.php?id=$id&userDeleteComment_id=$userCommentId'>Delete</a></div>";
      
    }
    
    echo "</div>";

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

<h3 class="backToPosts"><a href="../views/viewPosts.php">Back to all posts!</a></h3>

</main>
<footer id="footer">
     <div id="footer-container">

       <div class="info-company">

         <section class="about-us">
           <h3 id="footer-headline">About us</h3>
           <p>Millhouse is a wholesale company<br>
              that sells clothes, accessories and<br>
              small interior design items to fashion<br>
              and lifestyle stores.</p>
         </section>

         
         <section class="contact">
           <h3 id="footer-headline">Contact</h3> 
           
           <p><i class="fas fa-phone"></i> 040-222 222 222</p>
           <p><i class="fas fa-envelope"></i> millhouse@medieinstitutet.se</p>
          </section>

         <section class="social-media">
           <h3 id="footer-headline">Follow us</h3>
          <i class="fab fa-instagram-square"></i>
           <i class="fab fa-facebook"></i>
           <i class="fab fa-twitter"></i>
           <i class="fab fa-youtube"></i>
           <i class="fab fa-linkedin"></i>
         </section>



       </div>
     </div>


  </footer>
    
</body>
</html>
