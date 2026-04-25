<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="nav2.css">
<title>
Admin Dashboard
</title>
</head>

<body>

	<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> PHARMATRACK </h2>
			<a href="adminmainpage.php">Dashboard</a>
			<button class="dropdown-btn">Inventory
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="inventory-add.php">Add New Medicine</a>
				<a href="inventory-view.php">Manage Inventory</a>
			</div>
			
			<!-- <button class="dropdown-btn">Suppliers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="supplier-add.php">Add New Supplier</a>
				<a href="supplier-view.php">Manage Suppliers</a>
			</div>
			<button class="dropdown-btn">Stock Purchase
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="purchase-add.php">Add New Purchase</a>
				<a href="purchase-view.php">Manage Purchases</a>
			</div> -->
			
			<button class="dropdown-btn">Employees
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="employee-add.php">Add New Employee</a>
				<a href="employee-view.php">Manage Employees</a>
			</div>
			<!-- <button class="dropdown-btn">Customers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="customer-add.php">Add New Customer</a>
				<a href="customer-view.php">Manage Customers</a>
			</div>
			
			<a href="sales-view.php">View Sales Invoice Details</a>
			<a href="salesitems-view.php">View Sold Products Details</a>
			<a href="pos1.php">Add New Sale</a> -->
			
			<button class="dropdown-btn">Reports
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="stockreport.php">Medicines - Low Stock</a>
				<a href="expiryreport.php">Medicines - Soon to Expire</a>
				<!--<a href="salesreport.php">Transactions Reports</a>-->
			</div>
	</div>

	<div class="topnav">
		<a href="logout.php">Logout(Logged in as Admin)</a>
	</div>
	
	<div class="main-content">

		<center>
			<div class="head">
				<h2> ADMIN DASHBOARD </h2>
			</div>
		</center>

		<div class="dashboard-icons">
			<center>
				<a href="inventory-view.php" title="View Inventory">
					<img src="inventory.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Inventory">
				</a>
			
				<a href="employee-view.php" title="View Employees">
					<img src="emp.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Employees">
				</a>
			
				<a href="stockreport.php" title="Low Stock Alert">
					<img src="alert.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Low Stock">
				</a>
			
				<a href="expiryreport.php" title="Expiry Alert">
					<img src="expiryalert.jpg" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Expiry Alert">
				</a>
			</center>
		</div>

	</div>
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