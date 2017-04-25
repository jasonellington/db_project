<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
$sql="DELETE FROM `teams` WHERE `teams`.`school` = '$_POST[school]' AND `teams`.`mascot` = '$_POST[mascot]'";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record Deleted"; // Output to user
 ?> <script>location.href='teams.php';</script> <?php
 mysqli_close($con);
?> 

