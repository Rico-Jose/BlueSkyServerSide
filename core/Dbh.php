<?php

namespace app\core;

class Dbh
{
    protected function connect()
    {
        $params = array(
            'dbname' => 'bluesky',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );

        $conn = \Doctrine\DBAL\DriverManager::getConnection($params);
        return $conn;
    }

    protected function fetch(string $sql)
    {
        $stmt = $this->connect()->prepare($sql);
        $resultSet = $stmt->execute();
        $categories = array();

        while ($rows = $resultSet->fetchAllAssociative()) {
            $categories = $rows;
        }
        return $categories;
    }
}