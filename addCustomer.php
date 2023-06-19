<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Navigation.css">
	<title>User Registration Form</title>
	<style>
		form {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f2f2f2;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		input[type="text"],
		input[type="email"],
		input[type="number"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
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
	<h1>Add Customer</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" placeholder="Enter your username" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" placeholder="Enter your email" required>
        
		<label for="balance">Balance:</label>
		<input type="number" id="balance" name="balance" placeholder="Enter your balance" required>
		
		<input type="submit" value="Submit">
	</form>
    <?php 
        
        include("./dbconnect.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $balance = $_POST['balance'];
            
            // Validate form data
            // ...

            // Insert data into database using prepared statement
            $stmt = $connection->prepare("INSERT INTO customers (name, email, balance) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $name, $email, $balance);
            if ($stmt->execute()) {
                echo "Data inserted successfully.";
            } else {
                echo "Error inserting data: " . $stmt->error;
            }
        }
    ?>

</body>
</html>