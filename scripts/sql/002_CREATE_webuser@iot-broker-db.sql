/*
Webuser wordt aangemaakt
*/
CREATE USER 'webuser' @'localhost' IDENTIFIED by 'hFRfjCptDik9RQHH';

/*
USAGE
https://dev.mysql.com/doc/refman/8.0/en/privileges-provided.html#priv_usage
*/
GRANT USAGE ON *.* TO 'webuser' @'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

/*
Toekennen van de rechten
*/
GRANT SELECT,
    INSERT,
    UPDATE,
    DELETE ON `iot-broker-db_dev`.* TO 'webuser' @'localhost';
