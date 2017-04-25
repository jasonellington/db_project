<?php
session_start();
?>

<?php

 if(!($_SESSION["status"] == "ad")) {
 	include_once("./library_user.php");
 	echo "yep"; // To connect to the database
 }

 else {
 	include_once("./library.php");
 } // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (a DELETE query)
 $sql="DELETE FROM `players` WHERE `players`.`p_first_name` = '$_POST[p_first_name]' AND `players`.`p_last_name` = '$_POST[p_last_name]'";
 

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record deleted";
 ?> <script>location.href='players.php';</script> <?php // Output to user
 mysqli_close($con);
?>

<!-- DELETE FROM `cs4750s17jte4hm`.`players` WHERE `players`.`p_first_name` = \'Jason\' AND `players`.`p_last_name` = \'Ellington\' -->