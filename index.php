<?php

	include 'config.php';

	echo "<head>
		    <link rel='stylesheet' href='style.css'>
	</head>";

	echo "<h1> Student List</h1>";
	echo "<a href='add_student.php'> Add new stdudent </a><br><br>";


	echo "<table border='1'>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Roll no</th>
			<th>Class</th>
			<th>Action</th>
		</tr>";

	$query = "SELECT * FROM students ORDER BY roll_no";
	$stid = oci_parse($conn, $query);

	oci_execute($stid);



	while($row = oci_fetch_assoc($stid)){
		echo "
		<tr>

			<td>{$row['STD_ID']}</td>
			<td>{$row['STD_NAME']}</td>
			<td>". (is_null($row["ROLL_NO"]) ? 'NULL' : $row["ROLL_NO"]) . "</td>
			<td>".(is_null($row["CLASS"]) ? 'NULL' : $row["CLASS"])."</td>
			<td> <button class='action-buttons edit'><a href='edit_student.php?id={$row['STD_ID']}'> Edit</a></button>
				<button class='action-buttons delete'
				onclick='return confirmDelete({$row['STD_ID']})'>Delete</button>
			</td>
		</tr>";
	}

	echo "</table>";
?>


<script>
function confirmDelete(id) {
    if (confirm(`Are you sure you want to delete this student? ID: ${id}`)) {
        window.location.href = "delete_student.php?id=" + id;
    }
    return false; 
}
</script>