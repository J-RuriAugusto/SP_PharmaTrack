<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="nav2.css">
<title>
Pharmacist Dashboard
</title>
</head>
<style>
body {font-family:Arial;}
</style>

<body>

	<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> PHARMATRACK </h2>
			<a href="pharmmainpage.php">Dashboard</a>
			
			<a href="pharm-inventory.php">View Inventory</a>
			<button class="dropdown-btn">Reports
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="pharm-stockreport.php">Medicines - Low Stock</a>
				<a href="pharm-expiryreport.php">Medicines - Soon to Expire</a>
			</div>
	</div>
	
	<?php
	
	include "config.php";
	session_start();
	
	$sql="SELECT E_FNAME from EMPLOYEE WHERE E_ID='$_SESSION[user]'";
	$result=$conn->query($sql);
	$row=$result->fetch_row();
	
	$ename=$row[0];
		
	?>

	<div class="topnav">
		<a href="logout1.php">Logout(signed in as <?php echo $ename; ?>)</a>
	</div>
	
	<center>
	<div class="head">
	<h2> PHARMACIST DASHBOARD </h2>
	</div>

	
	<a href="pharm-inventory.php" title="View Inventory">
	<img src="inventory.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Inventory">
	</a>
	<a href="pharm-stockreport.php" title="Low Stock Alert">
		<img src="alert.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Low Stock">
	</a>

	<a href="pharm-expiryreport.php" title="Expiry Alert">
		<img src="expiryalert.jpg" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Expiry Alert">
	</a>
	</center>
</body>

<script>

	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
			dropdownContent.style.display = "none";
			} 
			else {
			dropdownContent.style.display = "block";
			}
		});
	}
	
</script>

</html>