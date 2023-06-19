<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Selected Customer</title>
    <link rel="stylesheet" href="selectACustomer.css">
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
    <form method="POST", action="Transfer.php">
    <?php
    include("./dbconnect.php");
    session_start();
    // Get customer ID from form submission
    $customer_id = $_POST['customer_id'];
    $_SESSION['fromID'] = $customer_id;
    // Retrieve data for selected customer
    $selectSql = "SELECT * from customers WHERE ID = $customer_id";
    $result = $connection->query($selectSql);
    
    $selectSql = "SELECT Name , ID from customers where ID != $customer_id";
    $allResult = $connection->query($selectSql);
    if ($result->num_rows > 0) {
        // Output customer details
        $row = $result->fetch_assoc();
        echo "<h1>Customer Details</h1>";
        echo "<div class = 'test'>";
        echo "<p><strong>ID:</strong> " . $row['ID'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['Name'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['Email'] . "</p>";
        echo "<p><strong>Balance:</strong> " . $row['Balance']. "$" . "</p>";
        echo "</div>";
    } else {
        echo "<p>No customer found with ID " . $customer_id . "</p>";
    }
    // Close connection
    //$connection->close();
?>
    <label for="cars">Transfer to: </label>
        <select id="forID" name="forID">
            <?php
            while($row = $allResult->fetch_assoc()){
                echo "<option value=" . $row['ID'] . ">" . $row['Name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="Amount">Amount</label>
        <br>
        <input type="text" id ="amount" name="amount">
        <input type="submit">
        <br>
    </form>
</body>
</html>
