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


$emp_id = intval($_POST['emp_id2']);
$job_fk = intval($_POST['job_fk']);
$mgr = intval($_POST['mgr']);
$salary = intval($_POST['salary']);
$commission = floatval($_POST['commission']);
$dept_fk = intval($_POST['dept_fk']);


echo $dept_fk;
echo $emp_id;
echo $job_fk;
echo $salary;

$sql = "INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) 
           VALUES ($emp_id,$emp_id,$job_fk,$mgr,$salary,$commission,$dept_fk)";


if (mysqli_query($conn, $sql)) {
    echo "Employee added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>
