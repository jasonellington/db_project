<html>
 <head>
  <title>Login</title>
 </head>
 <body>

<?php

//If Submit Button Is Clicked Do the Following
if ($_POST['Register']){

$myFile = "/Applications/XAMPP/xamppfiles/htdocs/cs4750/db_project/data/register.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $_POST['username'] . ":";
fwrite($fh, $stringData);
$stringData = $_POST['password'] . "\n";
fwrite($fh, $stringData);
fclose($fh);

} ?>


<script>location.href='login.html';</script>
	 
 </body>
</html>