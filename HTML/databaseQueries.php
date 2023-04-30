<?php

$servername = "localhost:3306";
$username = "root";
$password = "AdvancedDB";
$dbname = "AdvancedDatabases";

#$var = $_POST[''];
#$var = $_POST[''];
#$var = $_POST[''];

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


#$sql = $conn->prepare("INSERT INTO _____ (___,____,___) VALUES (?, ?, ?)");

#$sql->bind_param("sss", $var, $var, $var);

if ($sql->execute()) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . $sql->error;
}

$sql->close();
$conn->close();
?>
