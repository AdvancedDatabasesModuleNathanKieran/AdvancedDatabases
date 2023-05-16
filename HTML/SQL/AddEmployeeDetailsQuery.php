#!/usr/bin/php
<?php

$servername = "127.0.0.1";
$username = "root";
$password = "12345";
$port = "3306";
$database = "AdvancedDB";

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emp_id = $_POST['emp_id'];
$emp_id = intval($emp_id);
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$hire_date = $_POST['hire_date'];

$sql = "INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate)
        VALUES ('$emp_id', '$name', '$birthday', '$hire_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
