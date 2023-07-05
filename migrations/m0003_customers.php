<?php

use app\system\Application;
class m0003_customers
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE customers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                name VARCHAR(255) NOT NULL,
                status VARCHAR(255) NOT NULL ,
                gender VARCHAR(255) NOT NULL ,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )   ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE customers;";
        $db->pdo->exec($SQL);
    }
}