<?php
echo date('d-m-y h:i:s');
?>

<form method="POST" action="../includes/handleRegistration.php">
<input type="text" placeholder="Insert Username..." name="username"><br>
<input type="email" placeholder="Insert E-mail" name="email"><br>
<input type="password" placeholder="Insert Password..." name="password"><br>
<input type="submit" value="Register!">
</form>

Already registered ? <a href='login.php'> Login </a>