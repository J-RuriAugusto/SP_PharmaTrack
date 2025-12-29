<?php
		$conn = mysqli_connect("localhost:3307", "root", "", "pharmacy");
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
?>