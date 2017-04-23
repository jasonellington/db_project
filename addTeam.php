<?php
session_start();
?>

<?php if(!($_SESSION["status"] == "ad")) { ?>

<!DOCTYPE html>
<html>
<body>

<?php echo "You are not logged in or do not have access to this page." 
?>
</body>
</html>

<?php } else { ?>

<html lang="en">
<head>
  <title>T25 - Add Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <li class="breadcrumb-item active">Add Team</li>
</ol>
</div>

<div class="container">
  <h2>Add a Team to the Teams Table</h2>
  <BR>

    <form action="add_team.php" method="post">
    School: <input type="text" name="school">
    Mascot: <input type="text" name="mascot">
    Wins: <input type="number" name="wins">
    Losses: <input type="number" name="losses">
    Rank: <input type="number" name="rank">
    <input type="Submit">
    </form> 

<!--   <form action="add_player.php" method="post">
  <div class="form-group">
    <label for="p_first_name">First Name</label>
    <input type="text" class="form-control" id="p_first_name" name="p_first_name" placeholder="Johnny">
  </div>
  <div class="form-group">
    <label for="p_last_name">Last Name</label>
    <input type="text" class="form-control" id="p_last_name" name="p_last_name" placeholder="Appleseed">
  </div>
  <div class="form-group">
    <label for="year">Year</label>
    <input type="text" class="form-control" id="year" name="year" placeholder="1">
  </div>
  <div class="form-group">
    <label for="ppg">PPG</label>
    <input type="text" class="form-control" id="ppg" name="ppg" placeholder="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

</div>



</body>
</html>
<?php } ?>