<?php

$servername = "localhost:3306";
$username = "root";
$password = "AdvancedDB";
$dbname = "AdvancedDatabases";

$DeptNo = $_POST[''];
$DNAME  = $_POST[''];
$LocFk = $_POST[''];

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = $conn->prepare("INSERT INTO DEPARTEMENT (DEPTNO,DNAME,LocFk) VALUES (?, ?, ?)");

#$sql->bind_param("sss", $var, $var, $var);

if ($sql->execute()) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . $sql->error;
}

$sql->close();
$conn->close();
?>
