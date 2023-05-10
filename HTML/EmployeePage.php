<?php
$servername = "127.0.0.1";
$username = "root";
$password = "12345";
$port = "3306";
$database = "AdvancedDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

$sql = "SELECT EMP_DETAILS.EmpDetailsId, EMP_DETAILS.Name FROM EMP_DETAILS;;";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>MySQL</title>
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
<h1>MySQL</h1>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-content">
          <h1>Insert into EMP_DETAILS</h1>
          <form action="SQL/AddEmployeeDetailsQuery.php", method = "post">
            <label class="label" for="emp_id">Employee ID:</label>
            <input type="text" id="emp_id" name="emp_id">
            <label class="label" for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label class="label" for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday">
            <label class="label" for="hire_date">Hire Date:</label>
            <input type="date" id="hire_date" name="hire_date">
            <input class = "button is-link is-light" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>


  <div class="column">
    <div class="card">
      <div class="card-content">
        <h1>Insert into Employee</h1> 
        <form action="SQL/AddEmployee.php" method="POST">
          <div class="field">
            <label class =label for="emp_id2">Employee ID:</label>
            <select name="emp_id2" id="emp_id2">
            <?php 
            while($row = $result->fetch_assoc()) {
                  echo "<option value=".$row["EmpDetailsId"].">".$row["Name"]."</option>";
              }
              ?> 
            </select> 
          </field>
          <div class="field">
            <label class =label for="job_fk">Job:</label>
            <select type ="text" name="job_fk" id="job_fk">
            <?php 
            $sql = "SELECT JobId, JobTitle FROM JOB;";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                  echo "<option value=".$row["JobId"].">".$row["JobTitle"]."</option>";
              }
              ?> 
            </select> 
          </field>
            
          <div class="field">
            <label class =label for="mgr">Manager:</label>
            <select type = "text" name="mgr" id="mgr">
            <?php 
            $sql = "SELECT EMP.EmpDetailsFk, EMP_DETAILS.Name FROM EMP_DETAILS JOIN EMP ON EMP.EmpDetailsFk = EMP_DETAILS.EmpDetailsId;";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                  echo "<option value=".$row["EmpDetailsFk"].">".$row["Name"]."</option>";
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
                $sql = "SELECT DeptNo, DeptName FROM DEPT;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                      echo "<option value=".$row["DeptNo"].">".$row["DeptName"]."</option>";
                  }
                  ?>
                </select> 
          </div>
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
  
    <div class="column">
      <div class="card">
        <div class="card-content">
        <form action="SQL/AddDepartment.php" method="POST">
          <div class="field">
              <label class =label for="Department">Department:</label>
              <input type="text" name="Department" id="Department" placeholder= Department>
            </div>
            <div class="field">
            <label class =label for="dept_fk">Department:</label>
    
            <select name="loc_fk" id="loc_fk">
              <?php 
              $sql = "SELECT LocationId, Location FROM LOCATION;";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row["LocationId"].">".$row["Location"]."</option>";
                }
              ?>
              </select> 
            </div>
              
            <div class="field">
              <input class="button is-link is-light" type="submit" value="Add Department">
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
        <div class="field">
            <input class="button is-link is-light" type="submit" value="Query 3">
        </div>
        </div>
      </div>
    </div>

 
    </div>
  </body>
</html>