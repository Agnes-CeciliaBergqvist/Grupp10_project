<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Millhouse industries</title>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<header id="header">

<div id="header-name">
  <h1>Millhouse</h1>  

  <div id="nav-bar">
    <a href="../views/homepage.php">Start</a>
    <a href="../views/registration.php">Registration</a>
  </div>
</div> 
 
</header>

<form name="User" method="POST" action="../includes/handleLogin.php" align="center">

<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="loginBtn" value="login">

</form> 

Not a member ? <a href="registration.php"> Register now!<a>
</body>
</html>