<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '123456';
$db_name = 'hack';

function initializeDatabase() {
    global $db_host, $db_user, $db_pass, $db_name;

    try {
        $dsn = "mysql:host=$db_host";
        $connection = new PDO($dsn, $db_user, $db_pass);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE DATABASE IF NOT EXISTS `$db_name`";
        $connection->exec($sql);

        $dsn = "mysql:host=$db_host;dbname=$db_name";
        $connection = new PDO($dsn, $db_user, $db_pass);

        $sql = "CREATE TABLE IF NOT EXISTS `users` (
            `user_id` int unsigned NOT NULL AUTO_INCREMENT,
            `full_name` varchar(50) NOT NULL,
            `email` varchar(100) NOT NULL,
            `gender` enum('women','man') NOT NULL,
            `dob` varchar(255) NOT NULL,
            `password_hash` varchar(255) NOT NULL,
            `salt` varchar(100) DEFAULT NULL,
            `registration_date` datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`user_id`),
            UNIQUE KEY `email` (`email`)
        )";
        $connection->exec($sql);
    } catch (PDOException $e) {
        if ($e->getCode() == '42P07') { //  "42P07" is the code for "undefined table"
            initializeDatabase();
        } else {
            die("Error: " . $e->getMessage());
        }
    }
}


initializeDatabase();
