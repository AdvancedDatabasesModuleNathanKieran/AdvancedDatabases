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

$sql = "SELECT DEPT.DeptName, JOB.JobTitle, AVG(EMP.Salary) AS avg_salary
        FROM DEPT
        JOIN EMP ON DEPT.DeptNo = EMP.DeptFk
        JOIN JOB ON JOB.JobID = EMP.JobFk
        GROUP BY DEPT.DeptName, JOB.JobTitle
        HAVING avg_salary > 1200";

$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    // Start creating the HTML table
    echo "<table>";
    echo "<tr><th>Department</th><th>Job Title</th><th>Average Salary</th></tr>";
    
    // Fetch rows from the result set
    while ($row = mysqli_fetch_assoc($reult)) {
    // Output each row as a table row
        echo "<tr>";
        echo "<td>" . $row['DeptName'] . "</td>";
        echo "<td>" . $row['JobTitle'] . "</td>";
        echo "<td>" . $row['avg_salary'] . "</td>";
        echo "</tr>";
    }

    // Close the HTML table
    echo "</table>";
    } else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($connection);
    }

mysqli_close($connection);
?>
