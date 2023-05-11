<?php


$manager = new MongoDB\Driver\Manager("mongodb://Nathan:Nathan@localhost:27017");
$database = "EMP";
$collection = "Employees";
$filter = [];
$options = [];

// create a query object and execute the query
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery("$database.$collection", $query);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>MongoDB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  </head>
  <body>
  <nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item">
      Data Entry
    </a>
  </div>
</nav>
<h1>MongoDB</h1>
<div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-content">
          <h1>Insert into DEPT</h1>
          <form action="MONGODB/AddDepartement.php", method = "post">
            <label class="label" for="DeptNo">DeptNo:</label>
            <input type="text" id="DeptNo" name="DeptNo">
            <label class="label" for="DeptName">Name:</label>
            <input type="text" id="DeptName" name="DeptName">
            <label class="label" for="Location">Location:</label>
            <input type="text" id="Location" name="Location">
            <div class="field">
              <input class = "button is-link is-light" type="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>


  <div class="column">
    <div class="card">
      <div class="card-content">
        <h1>Insert into Employee</h1> 
        <form action="MONGODB/AddEmployee.php" method="POST">
          <div class="field">
            <label class =label for="Name">Name:</label>
            <input name="Name" id="Name">
          </field>
          <div class="field">
            <label class =label for="Birthday">Birthday:</label>
            <input type ="date" name="Birthday" id="Birthday">
          </field>
          <div class="field">
            <label class =label for="Hiredate">Hiredate:</label>
            <input type ="date" name="Hiredate" id="Hiredate">
          </field>
          <div class="field">
            <label class =label for="Job">Job:</label>
            <input type ="text" name="Job" id="Job">
          </field>

          <div class="field">
            <label class =label for="mgr">Manager:</label>
            <select type = "text" name="mgr" id="mgr">
            <?php 
              $query = new MongoDB\Driver\Query($filter, $options);
              $cursor = $manager->executeQuery("$database.$collection", $query);
                foreach ($cursor as $document) {
                  echo '<option value="' . $document->EmpId . '">' . $document->Name . '</option>';
              }
              ?> 
            </select> 
          </field>
          <div class="field">
            <label class =label for="salary">Salary:</label>
            <input type="text" name="salary" id="salary" placeholder= Salary>
          </div>

          <div class="field">
            <label class =label for="commission">Commission:</label>
            <input type="text" name="commission" id="commission" placeholder= Commission>
          </div>

          <div class="field">
            <label class =label for="dept_fk">Department:</label>
              <select name="dept_fk" id="dept_fk">
                <?php 
                  $collection = "Dept";
                  $filter = [];
                  $options = [];
                  
                  // create a query object and execute the query
                  $query = new MongoDB\Driver\Query($filter, $options);
                  $cursor = $manager->executeQuery("$database.$collection", $query);
                  foreach ($cursor as $document) {
                    echo '<option value="' . $document->DeptNo . '">' . $document->DeptName . '</option>';
                }
                ?>

          </div>
            <br>
          <div class="field">
            <input class="button is-link is-light" type="submit" value="Add Employee">
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    </div>
      </div>
    </div>

  
      <div class="column">
      <div class="card">
        <div class="card-content">
        <div class="field">
          <input class="button is-link is-light" type="submit" value="Query 1">
        </div>
        <div class="field">
            <input class="button is-link is-light" type="submit" value="Query 2">
        </div>
        </div>
      </div>
    </div>

 
    </div>
  </body>
</html>