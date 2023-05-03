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

#Create Location Table
cursor.execute("CREATE TABLE LOCATION (LocationId INT NOT NULL, Location VARCHAR(50) NOT NULL,PRIMARY KEY (LocationId))")
cursor.execute("CREATE TABLE JOB (JobId INT NOT NULL, JobTitle VARCHAR(50) NOT NULL, PRIMARY KEY (JobId))")

#Create Department Table
cursor.execute("CREATE TABLE dept (DEPTNO INT NOT NULL,DNAME VARCHAR(50) NOT NULL,LOCATIONID INT NOT NULL,PRIMARY KEY (DEPTNO), FOREIGN KEY (LOCATIONID) REFERENCES LOCATION(LocationID))")
cnx.commit()

# Close the database connection
cnx.close()