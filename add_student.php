<?php 


include 'config.php';

echo '<a href="index.php">Homepage </a>';


echo "<h1> Add Student </h1>";


if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$class = $_POST['class'];


	$query = "INSERT INTO students(std_name, roll_no, class) VALUES(:name, :roll, :class)";
	$stmnt = oci_parse($conn, $query);

	oci_bind_by_name($stmnt, ":name", $name);	
	oci_bind_by_name($stmnt, ":roll", $roll);
	oci_bind_by_name($stmnt, ":class", $class);

	oci_execute($stmnt);

	header("Location: index.php");
}

?>

	<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Roll No: <input type="text" name="roll"><br><br>
    Class: <input type="text" name="class"><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>