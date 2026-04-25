<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<title>
Reports
</title>
</head>

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

	$sql1="SELECT E_FNAME from EMPLOYEE WHERE E_ID='$_SESSION[user]'";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_row();
	
	$ename=$row1[0];
		
	?>

	<div class="topnav">
		<a href="logout1.php">Logout(signed in as <?php echo $ename; ?>)</a>
	</div>
	
	<center>
	<div class="head">
	<h2> STOCK EXPIRING WITHIN 3 MONTHS (LESS THAN 90 DAYS)</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>#</th>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Category</th>
			<th>Quantity</th>
			<th>Expiration Date</th>
		</tr>
		
	<?php
	
		include "config.php";
		$result=mysqli_query($conn,"CALL `EXPIRY`();");
		if ($result->num_rows > 0) { 

		$count = 1;

		while($row = $result->fetch_assoc()) {
			
		echo "<tr>";
			echo "<td>" . $count . "</td>";
			echo "<td>" . $row["med_id"]. "</td>";
			echo "<td>" . $row["med_name"]. "</td>";
			echo "<td>" . $row["category"]. "</td>";
			echo "<td>" . $row["med_qty"]. "</td>";
			$today = date("Y-m-d");
			$exp = $row["exp_date"];

			if ($exp < $today) {
				// expired
				echo "<td style='color:red; font-weight:bold;'>" . date("M d, Y", strtotime($exp)) . " (Expired)</td>";
			} elseif ($exp <= date("Y-m-d", strtotime("+90 days"))) {
				// expiring soon
				echo "<td style='color:orange;'>" . date("M d, Y", strtotime($exp)) . " (Soon)</td>";
			} else {
				echo "<td>" . date("M d, Y", strtotime($exp)) . "</td>";
			}
		echo "</tr>";
		
		$count++;
		}
		echo "</table>";
		} 

		$conn->close();
	
	?>
	
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
				} else {
				dropdownContent.style.display = "block";
				}
				});
			}
			
</script>

</html>
