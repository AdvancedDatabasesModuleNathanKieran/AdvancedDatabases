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


$sql = "SELECT EMP.EmpId, EMP_DETAILS.Name, EMP_DETAILS.Birthday, TIMESTAMPDIFF(YEAR, EMP_DETAILS.Birthday, CURDATE()) AS Age
        FROM EMP
        INNER JOIN EMP_DETAILS ON EMP.EmpDetailsFk = EMP_DETAILS.EmpDetailsId;";


$result = $conn->query($sql);
echo "<table>";
echo "<tr><th>EmpId</th><th>Name</th><th>Birthday</th><th>Age</th></tr>";

while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['EmpId'] . "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Birthday'] . "</td>";
      echo "<td>" . $row['Age'] . "</td>";
      echo "</tr>";
  }

mysqli_close($conn);
?>
