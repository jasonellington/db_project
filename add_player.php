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
 }
 
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO players (p_first_name, p_last_name, year, ppg)
 VALUES
 ('$_POST[p_first_name]','$_POST[p_last_name]','$_POST[year]','$_POST[ppg]')";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 ?> <script>location.href='players.php';</script> <?php
 mysqli_close($con);
?>

<!-- INSERT INTO `cs4750s17jte4hm`.`players` (`p_first_name`, `p_last_name`, `year`, `ppg`) VALUES ('Test', 'Test', '1', '1'); -->