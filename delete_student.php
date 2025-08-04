<?php
	
	include 'config.php';

	$id = $_GET['id'];

	$query = "DELETE FROM students
			  WHERE std_id = :id";

	$stmt = oci_parse($conn, $query);
	oci_bind_by_name($stmt, ':id', $id);
	oci_execute($stmt);

	echo "<h1 style='color:green'>Student deleted </h1>";
?>

<a href="index.php">Back to list</a>
