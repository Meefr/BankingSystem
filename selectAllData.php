<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Customers List</title>
	<link rel="stylesheet" href="selectAllData.css">
    <link rel="stylesheet" href="Navigation.css">

</head>
<body>
<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="selectAllData.php">Show All Customers</a></li>
				<li><a href="showAllTransfers.php">Show All Transfers</a></li>
				<li><a href="addCustomer.php">Add Customer</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<h1>Customers List</h1>
		<?php
			include("./dbconnect.php");
			$selectSql = "SELECT * from customers";
			$result = $connection->query($selectSql);
			// Set default column to display

			if ($result->num_rows > 0) {
				// Output table header
				echo "<form method='post' action='selectACustomer.php'>";
				echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Balance</th><th>Action</th></tr>";

				// Output table rows with submit buttons
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['ID'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Email'] . "</td>";
					echo "<td>" . $row['Balance']. "$" . "</td>";
					echo "<td><button type='submit' name='customer_id' value='" . $row['ID'] . "'>Select</button></td>";
					echo "</tr>";
				}

				// Output table footer
				echo "</table>";
				echo "</form>";
			} else {
				echo "0 results";
			}
			echo "<form method='post' action='showAllTransfers.php'>";
			echo "<button type='submit' name='transfers' value='transfers'>Show all Transfers</button>";
			echo "</form>";
			// Close connection
			$connection->close();
		?>
	</div>
</body>
</html>
