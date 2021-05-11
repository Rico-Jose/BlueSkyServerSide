<?php

namespace app\core;

class Category extends Dbh
{
    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connect()->prepare($sql);
        $resultSet = $stmt->execute();
        $categories;
    
        while ($rows = $resultSet->fetchAllAssociative()) {
            $categories = $rows;
        }
        return $categories;
    }

    public function addCategory(string $name)
    {
        $sql = "INSERT INTO categories (name) VALUES ('$name')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}