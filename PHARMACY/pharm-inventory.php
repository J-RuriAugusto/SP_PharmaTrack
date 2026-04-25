<?php

	include "config.php";
	
	if(isset($_POST['search'])) {
		
		$search=$_POST['valuetosearch'];
		$search_result=mysqli_query($conn,"SET @p0='$search';")or die(mysqli_error($conn));
		$search_result=mysqli_query($conn,"CALL `SEARCH_INVENTORY`(@p0);") or die(mysqli_error($conn));
	}
	else {
		$query="
			SELECT 
				m.med_id as medid,
				m.med_name as medname,
				m.category as medcategory,
				m.med_qty as medqty,
				m.exp_date
			FROM meds m
			GROUP BY m.med_id
		";
		$search_result=filtertable($query);
	}
	
	function filtertable($query)
	{	$conn = mysqli_connect("localhost:3307", "root", "", "pharmacy");
		$filter_result=mysqli_query($conn,$query);
		return $filter_result;
	}
	
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form2.css">
<title>
Inventory
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
	<h2> MEDICINE INVENTORY </h2>
	</div>
	
	<form method="post">
	<input type="text" name="valuetosearch" placeholder="Enter any value to Search" style="width:400px; margin-left:250px;">&nbsp;&nbsp;&nbsp;
	<input type="submit" name="search" value="Search">
	<br><br>
	</form>
	
	</center>
	

	<table align="right" id="table1" style="margin-top:20px; margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Category</th>
			<th>Quantity</th>
			<th>Expiry Date</th>
		</tr>
		
	<?php
		if ($search_result->num_rows > 0) {
		
		while($row = $search_result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["medid"]. "</td>";
			echo "<td>" . $row["medname"] . "</td>";
			echo "<td>" . $row["medcategory"]. "</td>";
			echo "<td>" . $row["medqty"]. "</td>";
			$exp = $row["exp_date"];
			if ($exp) {
				$today = date("Y-m-d");

				if ($exp < $today) {
					echo "<td style='color:red; font-weight:bold;'>" . date("M d, Y", strtotime($exp)) . " (Expired)</td>";
				} elseif ($exp <= date("Y-m-d", strtotime("+30 days"))) {
					echo "<td style='color:orange;'>" . date("M d, Y", strtotime($exp)) . " (Soon)</td>";
				} else {
					echo "<td>" . date("M d, Y", strtotime($exp)) . "</td>";
				}
			} else {
				echo "<td>N/A</td>";
			}
		echo "</tr>";
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
