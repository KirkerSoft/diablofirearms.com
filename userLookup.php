<?php
if (isset($_POST['username'])) {
	require 'db_connection.php';
	$sql = "SELECT username
		FROM students
		WHERE username = :username";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":username" => $_POST['username']));
	$record = $stmt->fetch();
	$output = array();
	if (empty($record)) {
		$output["exists"] = "false";
	}
	else {
		$output["exists"] = "true";
	}
	echo json_encode($output);
}
?>