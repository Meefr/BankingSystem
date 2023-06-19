//no need now 

<?php 
include("./dbconnect.php");
$sql = "ALTER TABLE transfers MODIFY ID INT AUTO_INCREMENT PRIMARY KEY";
$connection->query($sql);
?>