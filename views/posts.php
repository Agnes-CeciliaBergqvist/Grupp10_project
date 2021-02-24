<?php
 include("../includes/database_connection.php");
?>
<pre>
<form action="../includes/handleposts.php" method="POST" align=center>
    <h2>Make your new blogpost here</h2>
    <label for="titel">Titel:</label>
    <input type="text" name="titel">
    <h4>Description</h4>
    <textarea name="description" id="" cols="50" rows="20"></textarea><br>
    <!--<label for="image">Image:</label>-->
    <!--<input type="image" alt="Choose"><br>-->
    <label for="category">Category:</label>
    <input type="text" name="category"><br>
    <!--<label for="date">Date:</label>-->
    <!--<input type="date" name="postdate"><br>-->
    <input type="submit" name="publishBtn" value="publish" id="">
</form>
</pre>
