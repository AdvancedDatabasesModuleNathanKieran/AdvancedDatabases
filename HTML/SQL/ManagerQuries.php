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

$sql = "SELECT DEPT.DeptName, COUNT(DISTINCT EMP.MGR) AS num_managers 
        FROM DEPT JOIN EMP ON DEPT.DeptNo = EMP.DeptFk 
        GROUP BY DEPT.DeptNo HAVING num_managers > 1 
        ORDER BY num_managers DESC";


$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "<table>";
    echo "<tr><th>Department</th><th>Job Title</th><th>Average Salary</th></tr>";
    
    while ($row = mysqli_fetch_assoc($reult)) {
        echo "<tr>";
        echo "<td>" . $row['DeptName'] . "</td>";
        echo "<td>" . $row['JobTitle'] . "</td>";
        echo "<td>" . $row['avg_salary'] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
    } else {
    echo "Error: " . mysqli_error($connection);
    }

mysqli_close($connection);
?>
