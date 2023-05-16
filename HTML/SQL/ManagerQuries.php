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

$sql = "SELECT DEPT.DeptName, COUNT(DISTINCT EMP.JobFk) 
        AS num_managers FROM DEPT 
        JOIN EMP ON DEPT.DeptNo = EMP.DeptFk 
        JOIN JOB ON JOB.JobId = EMP.JobFk 
        WHERE JobTitle = 'MANAGER' 
        GROUP BY DEPT.DeptNo, DEPT.DeptName 
        HAVING num_managers < 2 
        ORDER BY num_managers DESC;";

$result = $conn->query($sql);
echo "<table>";
echo "<tr><th>Department</th><th>Managers</th></tr>";

while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['DeptName'] . "</td>";
      echo "<td>" . $row['num_managers'] . "</td>";
      echo "</tr>";
  }

mysqli_close($conn);
?>
