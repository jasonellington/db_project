<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	if($stmt->prepare("select * from teams where school like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchTeam'] . '%';
		$stmt->bind_param('s', $searchString);
		$stmt->execute();
		$stmt->bind_result($school, $mascot, $wins, $losses, $rank);
		echo "<table class='table'><th>school</th><th>mascot</th><th>wins</th><th>losses</th><th>rank</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$school</td><td>$mascot</td><td>$wins</td><td>$losses</td><td>$rank</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	
	$db->close();


?>
