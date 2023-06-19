<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Transfers List</title>
    <link rel="stylesheet" href="showAllTransfers.css">
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
      <h1>Transfers List</h1>
      <table>
        <tr>
          <th>Transfer ID</th>
          <th>From ID</th>
          <th>From Name</th>
          <th>To ID</th>
          <th>To Name</th>
          <th>Amount</th>
        </tr>
        <?php
        include("./dbconnect.php");
        $sql = "select * from transfers";
        $result = $connection->query($sql);
        while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $row['TransferID'] . "</td>";
          echo "<td>" . $row['FromID'] . "</td>";
          echo "<td>" . $row['FromName'] . "</td>";
          echo "<td>" . $row['ToID'] . "</td>";
          echo "<td>" . $row['ToName'] . "</td>";
          echo "<td>" . $row['Amount']. "$" . "</td>";
          echo "</tr>";
        }
        ?>
      </table>
    </div>
  </body>
</html>
