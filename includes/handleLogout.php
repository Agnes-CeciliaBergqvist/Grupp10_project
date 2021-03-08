<?php 
session_start();
include("database_connection.php");
?>
<?php
//ending session
session_start();
unset($_SESSION);
session_destroy();

header("location:../views/homepage.php");




?>