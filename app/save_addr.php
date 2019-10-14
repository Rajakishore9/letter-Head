<?php
include 'conn.php';
$header_name = $_POST['header_name'];
$header_body = $_POST['header_body'];

if (!empty($header_name)) {
	$sql = "INSERT INTO letter_head (header_name) VALUES ('".$header_name."')";

		if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}

if (!empty($header_body)) {
	$sql = "INSERT INTO letter_head (header_body) VALUES ( '".$header_body."')";

		if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}




mysqli_close($conn);


?>