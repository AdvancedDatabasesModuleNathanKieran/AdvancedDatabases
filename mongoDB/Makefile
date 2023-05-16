
build:
	docker build -t my-mongodb-image .
run:
	docker run -d --name mongo-container -e MONGO_INITDB_ROOT_USERNAME=EMP -e MONGO_INITDB_ROOT_PASSWORD=EMP -p 27017:27017 -v mongo_vol:/data/db mongo:4.4.3

import:
	docker cp DEPT.json mongo-container:/usr
	docker cp EMP.json mongo-container:/usr
	docker exec -i mongo-container mongoimport --jsonArray --db EMP --collection Dept --file usr/DEPT.json --username EMP --password EMP --authenticationDatabase=admin
	docker exec -i mongo-container mongoimport --jsonArray --db EMP --collection Employees --file usr/EMP.json --username EMP --password EMP --authenticationDatabase=admin
	