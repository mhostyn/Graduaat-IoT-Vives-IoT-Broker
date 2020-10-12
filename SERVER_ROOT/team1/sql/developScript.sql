SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `developersDashboard`
--
DROP DATABASE IF EXISTS `developersDashboard`;
CREATE DATABASE IF NOT EXISTS `developersDashboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE developersDashboard;

--
-- Table structure for table `user`
--
CREATE TABLE user (
  user_id INT UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  vkey varchar(32) DEFAULT 'uuid()',
  api_key varchar(32) NOT NULL DEFAULT 'uuid()',
  status set('vertification_sent','reset_requested','vertified','vertification_timeout') NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp()
);

--
-- Table structure for table `sensor`
--
CREATE TABLE sensor (
  sensor_id int(11) NOT NULL UNIQUE auto_increment,
  name varchar(255) NOT NULL UNIQUE,
  unit varchar(255) NOT NULL,
  type varchar(255) NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp(),
  user_id int(11) NOT NULL,
  PRIMARY KEY (sensor_id),
  FOREIGN KEY (user_id) REFERENCES user(user_id)
);

--
-- Table structure for table `data`
--
CREATE TABLE data (
data_id INT NOT NULL AUTO_INCREMENT,
value INT NOT NULL,
timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
sensor_id INT NOT NULL,
PRIMARY KEY (data_id),
FOREIGN KEY (sensor_id) REFERENCES sensor(sensor_id) 
);

--
-- Create new user / grant permissions
--
USE developersDashboard;
DROP USER IF EXISTS 'develeporsUser'@'localhost';
CREATE USER 'develeporsUser'@'localhost' IDENTIFIED BY 'hFRfjCptDik9RQHH';
GRANT ALL ON developersDashboard.* TO 'develeporsUser'@'localhost';
