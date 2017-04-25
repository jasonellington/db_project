<?php
session_start();
?>

<?php if(!isset($_SESSION['user'])) { ?>

<!DOCTYPE html>
<html>
<body>

<?php echo "You are not logged in or do not have access to this page." 
?>
</body>
</html>

<?php } else { ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>T25 - Starting Five</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script>
  	$(document).ready(function() {
  		$( "#LastNinput" ).change(function() {
  		
  			$.ajax({
  				url: 'CallStartingFive.php', 
  				data: {starting_five: $( "#LastNinput" ).val()},
  				success: function(data){
  					$('#LastNresult').html(data);	
  				  // $_SESSION['starting_five'] = $_POST['starting_five']; 
    				}
    			});
    		});
    		
    	});
	</script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.html">T25</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="#"><a href="user.php"><?php echo "User: " . $_SESSION["user"] . "<br>"; ?></a></li>
        <!-- li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul><!-- 
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="conferences.php">Conferences</a></li>
        <li><a href="gyms.php">Gyms</a></li>
        <li class="active"><a href="teams.php">Teams</a></li>
        <li><a href="coaches.php">Coaches</a></li>
        <li><a href="players.php">Players</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="teams.php">Teams</a></li>
  <li class="breadcrumb-item active">Starting Five</li>
</ol>
</div>

<div class="container">
  <h3>Search for Starting Five of a School</h3>	

  <div class="input-group">
    <input class="form-control" id="LastNinput" type="search" size="30" placeholder="Team Name Contains"/>
  </div>
  

</div>

<div class="container">

  <div id="LastNresult"></div>

</div>



</body>
</html>
</html>

<?php } ?>

