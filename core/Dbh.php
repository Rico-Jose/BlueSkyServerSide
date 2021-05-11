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
}