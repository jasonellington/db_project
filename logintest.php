<html>
 <head>
  <title>Register</title>
 </head>
 <body>

<?php

//If Submit Button Is Clicked Do the Following
if ($_POST['Register']){

$myFile = "data/register.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $_POST['username'] . ",";
fwrite($fh, $stringData);
$stringData = $_POST['password'] . ",";
fwrite($fh, $stringData);
$stringData = $_POST['status'] . ",";
fwrite($fh, $stringData);
$null = "null\n";
fwrite($fh, $null);
fclose($fh);

} ?>


<script>location.href='login.html';</script>
	 
 </body>
</html>