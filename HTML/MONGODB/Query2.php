<?php

$manager = new MongoDB\Driver\Manager("mongodb://EMP:EMP@localhost:27017");

$filter = [
    'Birthday' => ['$lt' => '1981-01-01'], // where age is over 42
    'DeptNo' => 20 // Where Research
];

$options = [];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery("EMP.Employees", $query);


echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>EmpId</th>";
echo "<th>Name</th>";
echo "<th>Birthday</th>";
echo "<th>Hiredate</th>";
echo "<th>MGR</th>";
echo "<th>Salary</th>";
echo "<th>Commission</th>";
echo "<th>DeptNo</th>";
echo "<th>JobTitle</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($cursor as $document) {
    echo '<tr>';
    echo '<td>' . $document->EmpId . '</td>';
    echo '<td>' . $document->Name . '</td>';
    echo '<td>' . $document->Birthday . '</td>';
    echo '<td>' . $document->Hiredate . '</td>';
    echo '<td>' . $document->MGR . '</td>';
    echo '<td>' . $document->Salary . '</td>';
    echo '<td>' . $document->Commission . '</td>';
    echo '<td>' . $document->DeptNo . '</td>';
    echo '<td>' . $document->JobTitle . '</td>';
    echo '</tr>';
}

echo '</tbody></table>';

?>
