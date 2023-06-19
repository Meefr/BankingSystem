
<?php

include("./dbconnect.php");
session_start();
$fromID = $_SESSION['fromID'];
$forID = $_POST['forID'];
$amount = $_POST['amount'];


$sql = "select balance from customers where id = $forID";
$result = $connection->query($sql);
$oldAmount = $result->fetch_assoc();
$newAmount = $amount + (int)$oldAmount['balance'];

$sql = "update customers set balance = '$newAmount' where id = '$forID'";
$connection->query($sql);


$sql = "select balance from customers where id = '$fromID'";
$result = $connection->query($sql);
$oldAmount = $result->fetch_assoc();
$newAmount = (int)$oldAmount['balance'] - $amount;

$sql = "select Name from customers where id = '$fromID'";
$result = $connection->query($sql)->fetch_assoc();
$fromName =  $result['Name'];

$sql = "select Name from customers where id = '$forID'";
$result = $connection->query($sql)->fetch_assoc();
$toName =  $result['Name'];

$sql = "insert into transfers(fromId,fromName,toID,toName,amount) values('$fromID','$fromName','$forID','$toName','$amount')";
if($connection->query($sql) === TRUE){
    echo "<script>alert('Insertion successful')</script>";
}else{
    echo "<script>alert('Insertion Failed')</script>";
}

$sql = "update customers set balance = '$newAmount' where id = '$fromID'";
if($connection->query($sql) === TRUE){
    echo "<script>alert('Transfer successful')</script>";
    header("Location: ./selectAllData.php");
}else{
    echo "<script>alert('Transfer Failed')</script>";
    header("Location: ./selectACustomer.php");
}
?>