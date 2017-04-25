<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO plays_against (home_team, visiting_team, date, home_score, visiting_score)
 VALUES
 ('$_POST[home_team]','$_POST[visiting_team]','$_POST[date]','$_POST[home_score]','$_POST[visiting_score]')";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 ?> <script>location.href='plays_against.php';</script> <?php
 mysqli_close($con);
?> 

