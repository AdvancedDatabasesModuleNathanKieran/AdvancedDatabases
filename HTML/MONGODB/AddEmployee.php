<?php
$manager = new MongoDB\Driver\Manager("mongodb://EMP:EMP@localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;

$filter = [];
$options = [
    'sort' => ['EmpId' => -1],
    'limit' => 1,
];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $manager->executeQuery('EMP.Employees', $query);
$data = current($rows->toArray());
$max_emp_id = $data->EmpId;

$document = array(
    "EmpId" => $max_emp_id + 1,
    "Name" => $_POST['Name'],
    "Birthday" => $_POST['Birthday'],
    "Hiredate" => $_POST['Hiredate'],
    "MGR" => $_POST['mgr'],
    "Salary" => $_POST['salary'],
    "Commission" => $_POST['commission'],
    "DeptNo" => $_POST['dept_fk'],
    "JobTitle" => $_POST['Job'],
);

$bulk->insert($document);

$result = $manager->executeBulkWrite('EMP.Employees', $bulk);

if ($result->getInsertedCount() == 1) {
    echo "New record created successfully";
} else {
    echo "Error: Failed to create a new record";
}

$filter = [];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery("EMP.Employees", $query);
  foreach ($cursor as $document) {
    echo '<option value="' . $document->EmpId . '">' . $document->Name . '</option>';
}


?>