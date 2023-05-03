import mysql.connector

# Set up connection details
host = "localhost"
user = "root"
password = "AdvancedDB"
database = "AdvancedDatabases"

# Connect to the database
cnx = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database=database
)

# Insert a new row into a table
cursor = cnx.cursor()

# Create Employees Details Table
cursor.execute("CREATE TABLE EMPLOYEES_DETAILS (EmployeeDetsId INT NOT NULL, Name VARCHAR(50) NOT NULL, Birthday VARCHAR(10) NOT NULL, Gender VARCHAR(20), Hire_Date VARCHAR(50) ,PRIMARY KEY (EmployeeDetsId))")

# Creates EMP Table
cursor.execute("CREATE TABLE EMPLOYEE (EmployeeId INT NOT NULL, EmployeeDetsFK INT NOT NULL ,JobFk INT NOT NULL, MGR INT NOT NULL, SAL FLOAT NOT NULL, COMM FLOAT NOT NULL, DeptFk INT NOT NULL ,PRIMARY KEY (EmployeeId), FOREIGN KEY (JobFK) REFRENCES JOB(JobId), FOREIGN KEY (DeptFk) REFRENCES DEPT(DEPTNO), FOREIGN KEY (EmployeeDetsFK) REFRENCES EMPLOYEES_DETAILS(EmployeeDetsId))")

# Create Job Table 
cursor.execute("CREATE TABLE JOB (JobId INT NOT NULL, Job_Title VARCHAR(50) NOT NULL, PRIMARY KEY (JobId))")

# Create Location Table
cursor.execute("CREATE TABLE LOCATION (LocationId INT NOT NULL, Location VARCHAR(50) NOT NULL,PRIMARY KEY (LocationId))")

# Create Department Table
cursor.execute("CREATE TABLE DEPT (DEPTNO INT NOT NULL, Dept_Name VARCHAR(50) NOT NULL, LOCATIONID INT NOT NULL,PRIMARY KEY (DEPTNO), FOREIGN KEY (LOCATIONID) REFERENCES LOCATION(LocationID))")
cnx.commit()

# Close the database connection
cnx.close()