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
     
</header>

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
