<?php

$servername = "127.0.0.1";
$username = "root";
$password = "12345";
$port = "3306";
$database = "AdvancedDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$DeptNo = "SELECT DeptNo FROM DEPT;";
$result = mysqli_query($conn, $DeptNo);

$highest = 0;
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    if ($row['DeptNo'] > $highest) {
      $highest = $row['DeptNo'];
      
    }
  }
}

$DeptNo = $highest + 10;

// Retrieve form data
$department = $_POST['Department'];
$loc_fk = intval($_POST['loc_fk']);

echo $loc_fk;

$sql = "INSERT INTO DEPT (DeptNo, DeptName, LocationFk) 
        VALUES ('$DeptNo', '$department', '$loc_fk')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>