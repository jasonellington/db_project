<?php
session_start();
?>

<?php
 require_once('./library.php');
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()) {
 echo("Can't connect to MySQL Server. Error code: " .
 mysqli_connect_error());
 return null;
 }
 // Form the SQL query (a SELECT query)
 $sql="SELECT * FROM players ORDER BY p_last_name";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 
 // echo $row['c_first_name'];
 // echo " " . $row['c_last_name'];
 // echo " " . $row['overall_wins'];
 // echo " " . $row['overall_losses'];
 // echo "<br>";
 
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

<html lang="en">
<head>
  <title>T25 - Players</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
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
        <li><a href="teams.php">Teams</a></li>
        <li><a href="coaches.php">Coaches</a></li>
        <li class="active"><a href="players.php">Players</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <h2>Players Table</h2>
  <p>This is a table of the starting players on top 25 teams.</p>
  <p>*Click on the table headers to sort by a specific column.</p>                              
  <a href="players.xml" class="btn btn-primary" role="button" download>Download XML</a>  

  <?php if($_SESSION["status"] == "ad" || $_SESSION["status"] == "player" || $_SESSION["status"] == "coach" ) { ?>

  <a href="addPlayer.php" class="btn btn-success" role="button">Add Player</a>
  <?php
  }?>           
  <a href="searchPlayer.php" class="btn btn-success" role="button">Search Player</a>            
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Year</th>
        <th>PPG</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
  	<?php while($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['p_first_name']?></td>
        <td><?php echo " " . $row['p_last_name'];?></td>
        <td><?php echo " " . $row['year'];?></td>
        <td><?php echo " " . $row['ppg'];?></td>
        <td><button type="submit" class="btn btn-danger btn-xs login-button" name="Delete" value="Delete">Delete</button></td>
        <td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<!-- DELETE FROM `cs4750s17jte4hm`.`players` WHERE `players`.`p_first_name` = \'Jason\' AND `players`.`p_last_name` = \'Ellington\' -->

<script>
  $(function(){
  $('#myTable').tablesorter(); 
  });
</script>


</body>
</html>

<?php } ?>