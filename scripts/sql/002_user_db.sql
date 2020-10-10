SELECT Host, USER from mysql.user;
CREATE USER 'webuser'@'localhost' identified by 'hFRfjCptDik9RQHH';
SELECT Host, User from mysql.user;
grant all on `iot-broker-db_dev.data` to 'webuser'@'localhost';
grant all on `iot-broker-db_dev.sensor` to 'webuser'@'localhost';
grant all on `iot-broker-db_dev.user` to 'webuser'@'localhost';
flush privileges;