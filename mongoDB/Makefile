build:
	docker build -t my-mongodb-image .
run:
	docker run -d -e MONGO_INITDB_ROOT_USERNAME=Nathan -e MONGO_INITDB_ROOT_PASSWORD=Nathan -p 27017:27017 -v mongo_vol:/data/db mongo:4.4.3