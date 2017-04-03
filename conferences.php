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
 $sql="SELECT * FROM conferences ORDER BY conference_title";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 
 // echo $row['c_first_name'];
 // echo " " . $row['c_last_name'];
 // echo " " . $row['overall_wins'];
 // echo " " . $row['overall_losses'];
 // echo "<br>";
 
?>

<html lang="en">
<head>
  <title>T25 -  Conferences</title>
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
      <a class="navbar-brand" href="#">T25</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
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
        <li class="active"><a href="conferences.php">Conferences</a></li>
        <li><a href="gyms.php">Gyms</a></li>
        <li><a href="teams.php">Teams</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stats<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="coaches.php">Coaches</a></li>
            <li><a href="players.php">Players</a></li>
          </ul>
        </li>
        <li>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <h2>Conferences Table</h2>
  <p>This is a table of the conferences of the top 25 teams.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Conference</th>
        <th>Number of Teams</th>
        <th>Power Five?</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['conference_title']?></td>
        <td><?php echo " " . $row['num_teams'];?></td>
        <td><?php echo " " . $row['power_five'];?></td>

      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>



</body>
</html>