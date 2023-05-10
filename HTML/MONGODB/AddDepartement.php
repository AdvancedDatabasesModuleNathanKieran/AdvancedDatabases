<?php
$manager = new MongoDB\Driver\Manager("mongodb://Nathan:Nathan@localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;

$document = array(
    "DeptNo" => $_POST['DeptNo'],
    "DeptName" => $_POST['DeptName'],
    "Location" => $_POST['Location']
);

$bulk->insert($document);

$result = $manager->executeBulkWrite('DEPT.DEPT', $bulk);


if ($result->getInsertedCount() == 1) {
    echo "New record created successfully";
} else {
    echo "Error: Failed to create a new record";
}
?>
