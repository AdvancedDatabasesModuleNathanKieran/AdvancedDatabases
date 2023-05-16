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

$sql = "SELECT EMP.EmpId, EMP_DETAILS.Name, EMP_DETAILS.Birthday, TIMESTAMPDIFF(YEAR, EMP_DETAILS.Birthday, CURDATE()) 
        AS Age
        FROM EMP
        INNER JOIN EMP_DETAILS ON EMP.EmpDetailsFk = EMP_DETAILS.EmpDetailsId";

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

    // Close the HTML table
    echo "</table>";
    } else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($connection);
    }

mysqli_close($connection);
?>
