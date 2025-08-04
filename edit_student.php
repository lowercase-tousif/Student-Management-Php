<?php
	
	include 'config.php';

	echo "<h1> Edit Student Details</h1>";
	echo '<a href="index.php">Homepage </a>';

	$id = $_GET['id'];
	

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name = $_POST['name'];
		$roll_no = $_POST['roll'];
		$class = $_POST['class'];

		$query = "UPDATE students
				  SET std_name = :name, roll_no = :roll, class = :class
				  WHERE std_id = :id";

		$stmt = oci_parse($conn, $query);

		oci_bind_by_name($stmt, ':name', $name);
		oci_bind_by_name($stmt, ':roll', $roll_no);
		oci_bind_by_name($stmt, ':class', $class);
		oci_bind_by_name($stmt, ':id', $id);

		oci_execute($stmt);

		echo "<h1 style='color:green'> student updated successfully </h1>";
	}


	$query = "SELECT *
			  FROM students
			  WHERE std_id = :id";

	$stmt = oci_parse($conn, $query);
	oci_bind_by_name($stmt, ':id', $id);
	oci_execute($stmt);
	$row = oci_fetch_assoc($stmt);

?>

<form method="POST">
	Name: <input type="text" name="name" value="<?= $row['STD_NAME'] ?>"> <br>
	Roll: <input type="text" name="roll" value="<?= $row['ROLL_NO'] ?>"> <br>
	Class: <input type="text" name="class" value="<?= $row['CLASS'] ?>"> <br>

	<input type="submit" name="submit">
</form>