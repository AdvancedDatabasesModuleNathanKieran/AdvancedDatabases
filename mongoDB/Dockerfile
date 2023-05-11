FROM mongo
COPY DEPT.json usr/src/DEPT.json
COPY EMP.json usr/src/EMP.json
COPY . .
EXPOSE 27017
CMD ["mongod"]