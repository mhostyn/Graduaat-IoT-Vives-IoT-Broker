SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `iotBrokerDB`
--
DROP DATABASE IF EXISTS `iotBrokerDB`;
CREATE DATABASE `iotBrokerDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iotBrokerDB`;
CREATE TABLE `user` (
  `user_id` INT UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `vkey` VARCHAR(32) NOT NULL,
  `api_key` VARCHAR(32) NOT NULL,
  `status`
  SET(
      'vertification_sent',
      'reset_requested',
      'vertified',
      'vertification_timeout'
    ) NOT NULL,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ()
);
CREATE TABLE `sensor` (
  `sensor_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `unit` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
  `user_id` INT NOT NULL,
  PRIMARY KEY (`sensor_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);
CREATE TABLE `data` (
  `data_id` INT NOT NULL AUTO_INCREMENT,
  `value` INT NOT NULL,
  `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sensor_id` INT NOT NULL,
  PRIMARY KEY (`data_id`),
  FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`)
);
--
-- Create new user / grant permissions
--
USE `iotBrokerDB`;
DROP USER IF EXISTS 'developerUser' @'localhost';
CREATE USER 'developerUser' @'localhost' IDENTIFIED BY 'hFRfjCptDik9RQHH';
GRANT ALL ON `iotBrokerDB`.* TO 'developerUser' @'localhost';
DROP USER IF EXISTS 'webuser' @'localhost';
CREATE USER 'webuser' @'localhost' IDENTIFIED by 'hFRfjCptDik9RQHH';
GRANT SELECT,
  INSERT,
  UPDATE,
  DELETE ON `iotBrokerDB`.* TO 'webuser' @'localhost';
/* voor Node-Red
 Error: ER_NOT_SUPPORTED_AUTH_MODE: 
 Client does not support authentication protocol requested by server; 
 consider upgrading MySQL client
 */
DROP USER IF EXISTS 'node-red' @'localhost';
CREATE USER 'node-red' @'localhost' IDENTIFIED WITH mysql_native_password BY 'hFRfjCptDik9RQHH';
GRANT SELECT,
  INSERT,
  UPDATE,
  DELETE ON `iotBrokerDB`.* TO 'node-red' @'localhost';
FLUSH PRIVILEGES;