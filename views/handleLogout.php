<?php 
session_start();
$db = new PDO('mysql:host=localhost;dbname=Millhouse;charset=utf8mb4', 'root', '');
?>
<?php

session_start();
unset($_SESSION);
session_destroy();

header("location:homepage.php");




?>