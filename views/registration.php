<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
<script src="../JavaScript/Js.js" defer></script>

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
//echo date('d-m-y h:i:s');
?>

<!-- Information from the new user for registration -->
<div class="registration">
<form method="POST" action="../includes/handleRegistration.php">
<input class ="regFields" type="text" placeholder="Insert Username..." name="username"><br>
<input class ="regFields"type="email" placeholder="Insert E-mail" name="email"><br>
<input class ="regFields"type="password" placeholder="Insert Password..." name="password"><br>
<input class ="regBtn" type="submit" value="Register!">
</form>
</div>
<p class="AlreadyReg">Already registered ? <a href='login.php'> Login </a></p>


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