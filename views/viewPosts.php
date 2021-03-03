<!--This page shows all the posts that have been posted-->
<!DOCTYPE html>
<html>
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
  echo "<a href='specificPost.php?id=$postId' > Go to Comments!  </a>";
  if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin"){
  echo "<div class='adminBtns'> <a href='../includes/handleDelete.php?delete_id=$postId'>Delete</a>" ;
  echo "<a href='../views/edit.php?id=$postId'>Edit</a></div>";  
  }
  echo "</div>";
  echo "<div class='commentBox'>";
  echo "</div>";
 
}
echo "</div>";

  ?>
  


  
  
  


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