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

<?php 
session_start();
include("../includes/database_connection.php");

//check if the user is logged in
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1 class="WelcomePosts">Welcome '.$_SESSION['sess_user_name'].'!</h1>';
  
  
  // You are only able to make posts if you are logged in!
  

  echo '<form class ="makePost" action="../includes/handleposts.php" method="POST" enctype="multipart/form-data">
  <h2 class="newPost" >Make your new blogpost here</h2>
  <label class="postFields" for="title">Title:</label>
  <input class="postFields" type="text" name="title"></br>
  <input class="postFields" type="file" name="chosenImage"/><br />  
  <h4 class="postFields">Message</h4>
  <textarea class="postFields" name="message" id="message" cols="50" rows="20"></textarea><br>
  <!--<label for="image">Image:</label>-->
  <!--<input type="image" alt="Choose"><br>-->
  <label class="postFields" for="category">Select a category</label>
  <select class="postFields" name="category" id="category">
  <option value="Watches">Watches</option>
  <option value="Sunglasses">Sunglasses</option>
  <option value="Home-interior">Home-interior</option>
  </select></br>
  <!--<label for="date">Date:</label>-->
  <!--<input type="date" name="postdate"><br>-->
  <input class="PublishPost" type="submit" name="publishBtn" value="publish" id="">
</form>';


} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
}
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




