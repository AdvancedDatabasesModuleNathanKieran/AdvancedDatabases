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

$sql = "SELECT DEPT.DeptName, JOB.JobTitle, AVG(EMP.Salary) AS avg_salary
        FROM DEPT
        JOIN EMP ON DEPT.DeptNo = EMP.DeptFk
        JOIN JOB ON JOB.JobID = EMP.JobFk
        GROUP BY DEPT.DeptName, JOB.JobTitle
        HAVING avg_salary > 1200";

$result = $conn->query($sql);
echo "<table>";
echo "<tr><th>DeptName</th><th>JobTitle</th><th>Avg Salary</th></tr>";

while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['DeptName'] . "</td>";
      echo "<td>" . $row['JobTitle'] . "</td>";
      echo "<td>" . $row['avg_salary'] . "</td>";
      echo "</tr>";
  }

mysqli_close($conn);
?>