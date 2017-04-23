<html>
 <head>
  <title>Login</title>
 </head>
 <body>

<?php

//If Submit Button Is Clicked Do the Following
if ($_POST['Login']){

// $myFile = "/Applications/XAMPP/xamppfiles/htdocs/cs4750/db_project/data/register.txt";
// $fh = fopen($myFile, 'a') or die("can't open file");
// $stringData = $_POST['username'] . ":";
// fwrite($fh, $stringData);
// $stringData = $_POST['password'] . "\n \n";
// fwrite($fh, $stringData);
// fclose($fh);
$userN = $_POST['username'];
$passW = $_POST['password'];
$userlist = file ('data/register.txt');

$success = false;
foreach ($userlist as $user) {
    $user_details = explode(',', $user);
    if ($user_details[0] == $userN && $user_details[1] == $passW) {
        $success = true;
        session_start();
        $_SESSION["user"] = $userN;
        $_SESSION["status"] = $user_details[2];
        break;
    }
}

if ($success) {
    echo "<br> Logging In... <br>";
    ?> <script>location.href='conferences.php';</script> <?php
} else {
    ?> <script>location.href='login.html';</script> <?php
    echo "<br> You have entered the wrong username or password. Please try again. <br>";
    echo "<br> username: $userN password: $passW <br>";
}
} ?>

	 
 </body>
</html>