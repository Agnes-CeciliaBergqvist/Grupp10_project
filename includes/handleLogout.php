<?php 
session_start();
include("database_connection.php");
?>
<?php

session_start();
unset($_SESSION);
session_destroy();

header("location:../views/homepage.php");




?>