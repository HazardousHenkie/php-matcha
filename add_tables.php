<?php

    include_once 'config/database.php';
    $database = new Database();

    $sql = "CREATE TABLE IF NOT EXISTS `customers` (
        `customer_id` int(11) NOT NULL AUTO_INCREMENT,
        `customer_name` varchar(100) NOT NULL,
        PRIMARY KEY (`customer_id`)
    ) ENGINE=INNODB";

    $res = $database->run_query($sql);

    $sql2 = " CREATE TABLE IF NOT EXISTS `orders` (
        `order_id` int(11) NOT NULL AUTO_INCREMENT,
        `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
        `amount` double NOT NULL,
        `customer_id` int(11) NOT NULL,
        PRIMARY KEY (`order_id`),
        FOREIGN KEY (customer_id) REFERENCES customers(customer_id) 
    ) ENGINE=INNODB";

    
    $res = $database->run_query($sql2);
?>