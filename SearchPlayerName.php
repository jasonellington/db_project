<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	if($stmt->prepare("select * from players where p_last_name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchPlayer'] . '%';
		$stmt->bind_param('s', $searchString);
		$stmt->execute();
		$stmt->bind_result($p_first_name, $p_last_name, $year, $ppg);
		echo "<table class='table'><th>p_first_name</th><th>p_last_name</th><th>year</th><th>ppg</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$p_first_name</td><td>$p_last_name</td><td>$year</td><td>$ppg</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	
	$db->close();


?>
