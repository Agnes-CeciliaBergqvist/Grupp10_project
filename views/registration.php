<link href="../CSS/style.css" rel="stylesheet" type="text/css"/>

<header id="header">

<div id="header-name">
  <h1>Millhouse</h1>  

  <div id="nav-bar">
    <a href="../views/homepage.php">Start</a>
    <a href="../views/login.php">Login</a>
  </div>
</div> 
 
</header>

<?php
echo date('d-m-y h:i:s');
?>

<!-- Information from the new user for registration -->

<form method="POST" action="../includes/handleRegistration.php">
<input type="text" placeholder="Insert Username..." name="username"><br>
<input type="email" placeholder="Insert E-mail" name="email"><br>
<input type="password" placeholder="Insert Password..." name="password"><br>
<input type="submit" value="Register!">
</form>

Already registered ? <a href='login.php'> Login </a>