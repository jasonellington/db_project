<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	if($stmt->prepare("CALL starting_five('". $_GET['starting_five'] . "')") or die(mysqli_error($db))) {
		// $searchString = '%' . $_GET['starting_five'] . '%';
		// $stmt->bind_param('s', $searchString);
		$stmt->execute();
		$stmt->bind_result($p_first_name, $p_last_name, $school);
		echo "<table class='table'><th>First Name</th><th>Last Name</th><th>School</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$p_first_name</td><td>$p_last_name</td><td>$school</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	
	$db->close();


?>
