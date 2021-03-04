<!--This code should give us a new page with the message that we would like to edit-->
<link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
<script src="../JavaScript/Js.js" defer></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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

    <!-- Behöver vi denna koden????  -->


<!-- //Form for updating the exsisting post -->
<!-- <form method="POST" action ="../includes/handleEdit.php?">
<input type="hidden" name="id" value=" echo $post_id; ?>"/> -->


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

