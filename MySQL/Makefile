# Define variables
IMAGE_NAME = mysql-image
CONTAINER_NAME = mysql-container
PORT_MAPPING = 3306:3306
ROOT_PASSWORD = AdvancedDB
DB_NAME = AdvancedDatabases

# Build the Docker image
build:
	docker build -t $(IMAGE_NAME) .

# Start the Docker container
run:
	docker run --name $(CONTAINER_NAME) -p $(PORT_MAPPING) -e MYSQL_ROOT_PASSWORD=$(ROOT_PASSWORD) -d $(IMAGE_NAME)

# Create the database
createdb:
	docker exec -it $(CONTAINER_NAME) mysql -uroot -p$(ROOT_PASSWORD) -e "CREATE DATABASE $(DB_NAME)"

#Populate Database
datapopulationscript:
	docker exec -it $(CONTAINER_NAME) mysql -uroot -p$(ROOT_PASSWORD) -e "python Datapopulation.py"