import mysql.connector

# Set up connection details
host = "localhost"
user = "root"
password = "12345"
database = "AdvancedDB"

# Connect to the database
cnx = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database=database
)

# Insert a new row into a table
cursor = cnx.cursor()

#Create Location Table
cursor.execute("CREATE TABLE LOCATION (LocationId INT NOT NULL, Location VARCHAR(50) NOT NULL,PRIMARY KEY (LocationId))")
cursor.execute("CREATE TABLE JOB (JobId INT NOT NULL, JobTitle VARCHAR(50) NOT NULL, PRIMARY KEY (JobId))")
cursor.execute("CREATE TABLE DEPT (DeptNo INT NOT NULL,DeptName VARCHAR(50) NOT NULL,LocationFk INT NOT NULL,CONSTRAINT PK_DEPT PRIMARY KEY (DeptNo),CONSTRAINT FK_DEPT_LOCATION FOREIGN KEY (LocationFk) REFERENCES LOCATION(LocationId))")
cursor.execute("CREATE TABLE EMP_DETAILS (EmpDetailsId INT NOT NULL,Name VARCHAR(50),Birthday DATE NOT NULL,HireDate DATE NOT NULL,PRIMARY KEY (EmpDetailsId))")
cursor.execute("CREATE TABLE EMP (EmpId INT NOT NULL PRIMARY KEY,EmpDetailsFk INT NOT NULL,JobFk INT NOT NULL,MGR INT,Salary FLOAT NOT NULL,Commission FLOAT,DeptFk INT NOT NULL,CONSTRAINT FK_EMP_JOB FOREIGN KEY (JobFk) REFERENCES JOB(JobId),CONSTRAINT FK_EMP_DEPT FOREIGN KEY (DeptFk) REFERENCES DEPT(DeptNo),CONSTRAINT FK_EMP_DETAILS FOREIGN KEY (EmpDetailsFk) REFERENCES EMP_DETAILS(EmpDetailsId));")
#Location Values
cursor.execute("INSERT INTO LOCATION (LocationId, `Location`)  VALUES (1, 'NEW YORK')")
cursor.execute("INSERT INTO LOCATION (LocationId, `Location`)  VALUES (2, 'DALLAS')")
cursor.execute("INSERT INTO LOCATION (LocationId, `Location`)  VALUES (3, 'CHICAGO')")
cursor.execute("INSERT INTO LOCATION (LocationId, `Location`)  VALUES (4, 'BOSTON')")
#Job Values
cursor.execute("INSERT INTO JOB (JobId, `JobTitle`) VALUES (1,'CLERK')")
cursor.execute("INSERT INTO JOB (JobId, `JobTitle`) VALUES (2,'SALESMAN')")
cursor.execute("INSERT INTO JOB (JobId, `JobTitle`) VALUES (3,'MANAGER')")
cursor.execute("INSERT INTO JOB (JobId, `JobTitle`) VALUES (4,'PRESIDENT')")
cursor.execute("INSERT INTO JOB (JobId, `JobTitle`)  VALUES (5, 'ANALYST')")
#Department Values
cursor.execute("INSERT INTO DEPT(DeptNo, `DeptName`, `LocationFk`)VALUES(10,'ACCOUNTING',1)")
cursor.execute("INSERT INTO DEPT(DeptNo, `DeptName`, `LocationFk`)VALUES(20,'RESEARCH',2)")
cursor.execute("INSERT INTO DEPT(DeptNo, `DeptName`, `LocationFk`)VALUES(30,'SALES',3)")
cursor.execute("INSERT INTO DEPT(DeptNo, `DeptName`, `LocationFk`)VALUES(40,'OPERATIONS',4)")
#EmpDetails Values
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7369, 'SMITH', '1980-12-17', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7499, 'ALLEN', '1981-02-20', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7521, 'WARD', '1981-02-22', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7566, 'JONES', '1981-04-02', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7654, 'MARTIN', '1981-09-28', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7698, 'BLAKE', '1981-05-01', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7782, 'CLARK', '1981-06-09', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7839, 'KING', '1981-11-17', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7844, 'TURNER', '1981-09-08', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7876, 'ADAMS', '1987-09-23', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7900, 'JAMES', '1981-12-03', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7902, 'FORD', '1981-12-03', '2000-09-13')")
cursor.execute("INSERT INTO EMP_DETAILS (EmpDetailsId, Name, Birthday, HireDate) VALUES (7934, 'MILLER', '1982-01-23', '2000-09-13')")
#Emp Values
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7369,7369,1,7902,800,NULL,20)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7499,7499,2,7698,1600,300,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7521,7521,2,7698,1250,500,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7566,7566,3,7839,2975,NULL,20)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7654,7654,2,7698,1250,1400,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7698,7698,3,7839,2850,NULL,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7782,7782,3,7839,2450,NULL,10)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7839,7839,4,NULL,5000,NULL,10)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7844,7844,2,7698,1500,0,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7876,7876,1,7788,1100,NULL,20)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7900,7900,1,7698,950,NULL,30)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7902,7902,5,7566,3000,NULL,20)")
cursor.execute("INSERT INTO EMP (EmpId, EmpDetailsFk, JobFk, MGR, Salary, Commission, DeptFk) VALUES (7934,7934,1,7782,1300,NULL,10)")

# Close the database connection
cnx.commit()
cnx.close()