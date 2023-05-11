import pymysql
import json
import datetime
from pymysql.constants import FIELD_TYPE
from pymysql.converters import conversions
import pymongo

# Set up connection details
host = "localhost"
user = "root"
password = "12345"
database = "AdvancedDB"

conv = conversions.copy()

# Connect to the database
cnx = pymysql.connect(
    host=host,
    user=user,
    password=password,
    database=database,
    conv = conv
)
cursor = cnx.cursor()

cursor.execute("SELECT DEPT.DeptNo,DEPT.DeptName, LOCATION.LocationId, LOCATION.Location FROM LOCATION JOIN DEPT ON LOCATION.LocationId = DEPT.LocationFk;")
DEPT = cursor.fetchall()
dept_list = []

for row in DEPT:
    data = {
        "DeptNo": row[0],
        "DeptName": row[1],
        "Location": row[3]
    }
    data2 = dict(data)
    del data
    dept_list.append(data2)

with open("DEPT.json", "w") as write_file:
    json.dump(dept_list, write_file, indent=4)

cursor.execute("SELECT EMP.EmpId,EMP_DETAILS.Name,EMP_DETAILS.Birthday,EMP_DETAILS.Hiredate,EMP.MGR,EMP.Salary,EMP.Commission,DEPT.DeptNo,JOB.JobTitle FROM EMP JOIN EMP_DETAILS ON EMP.EmpId = EMP_DETAILS.EmpDetailsId JOIN JOB ON EMP.JobFk = JOB.JobId JOIN DEPT ON EMP.DeptFk = DEPT.DeptNo;")
EMP = cursor.fetchall()

EMP_LIST = []

for row in EMP:
    employee_dict = {
    "EmpId": row[0],
    "Name": row[1],
    "Birthday": str(row[2]),
    "Hiredate": str(row[3]),
    "MGR": row[4],
    "Salary": row[5],
    "Commission":row[6],
    "DeptNo": row[7],
    "JobTitle": row[8],
    }
    data3 = dict(employee_dict)
    del employee_dict
    EMP_LIST.append(data3)

with open("EMP.json", "w") as fp:
    json.dump(EMP_LIST,fp,indent=4) 





## Connect to mongoDB
client = pymongo.MongoClient("mongodb://Nathan:Nathan@localhost:27017/")

## Create DEPT 
db = client["DEPT"]
collection = db["Departement"]


#results = collection.insert_many(EMP_LIST)
#result = collection.insert_many(dept_list)

db = client["EMP"]
collection = db["Employee"]
