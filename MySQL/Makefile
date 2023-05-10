# Docker image name and tag
IMAGE_NAME=my-mysql
IMAGE_TAG=latest

# Docker commands
build:
	docker build -t $(IMAGE_NAME):$(IMAGE_TAG) .

run:
	docker run -e MYSQL_ROOT_HOST=% -e MYSQL_ROOT_PASSWORD=12345 -p 3306:3306 -d mysql/mysql-server


populate:
	python3 Datapopulation
	
stop:
	docker stop my-mysql-container
