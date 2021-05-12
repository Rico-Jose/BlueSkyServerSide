<?php

namespace app\core;

class Dbh
{
    // Connect to the database
    private function connect()
    {
        $params = array(
            'dbname' => 'bluesky',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );
        
        // Use Doctrine\DBAL\DriverManager class to get a DBAL connection
        $conn = \Doctrine\DBAL\DriverManager::getConnection($params);
        return $conn;
    }
    
    // Fetch all categories
    public static function fetchCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = self::connect()->prepare($sql);
        $resultSet = $stmt->execute();
        $categories = array();

        while ($rows = $resultSet->fetchAllAssociative()) {
            $categories = $rows;
        }
        return $categories;
    }

    // Fetch a category using its id
    public static function fetchCategory(int $id)
    {
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $stmt = self::connect()->prepare($sql);
        $resultSet = $stmt->execute();

        return $category = $resultSet->fetchAssociative();
    }

    // Add a category
    public function addCategory(Category $category)
    {
        $name = $category->getName();
        $sql = "INSERT INTO categories (name) VALUES ('$name')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}