<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	if($stmt->prepare("select * from coaches where c_last_name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchCoach'] . '%';
		$stmt->bind_param('s', $searchString);
		$stmt->execute();
		$stmt->bind_result($c_first_name, $c_last_name, $overall_wins, $overall_losses);
		echo "<table class='table'><th>c_first_name</th><th>c_last_name</th><th>overall_wins</th><th>overall_losses</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$c_first_name</td><td>$c_last_name</td><td>$overall_wins</td><td>$overall_losses</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	
	$db->close();


?>
