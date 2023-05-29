<?php

class m0003_customers
{
    public function up()
    {
        $db = \app\system\Application::$app->db;
        $SQL = "CREATE TABLE customers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                status TINYINT DEFAULT 0,
                gender TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )   ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\system\Application::$app->db;
        $SQL = "DROP TABLE customers;";
        $db->pdo->exec($SQL);
    }
}