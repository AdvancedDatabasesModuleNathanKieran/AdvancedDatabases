<?php
$manager = new MongoDB\Driver\Manager("mongodb://Nathan:Nathan@localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;

$filter = [];
$options = [
    'sort' => ['EmpId' => -1],
    'limit' => 1,
];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $manager->executeQuery('DB_NAME.COLLECTION_NAME', $query);
$data = current($rows->toArray());
$max_emp_id = $data->EmpId;

$document = array(
    "EmpId" => $max_emp_id + 1,
    "Name" => $_POST['Birthday'],
    "Birthday" => $_POST['Birthday'],
    "Hiredate" => $_POST['Hiredate'],
    "MGR" => $_POST['mgr'],
    "Salary" => $_POST['salary'],
    "Commission" => $_POST['commission'],
    "DeptNo" => $_POST['dept_fk'],
    "JobTitle" => $_POST['Job'],
);

$bulk->insert($document);

$result = $manager->executeBulkWrite('DEPT.EMP', $bulk);

if ($result->getInsertedCount() == 1) {
    echo "New record created successfully";
} else {
    echo "Error: Failed to create a new record";
}
?>
