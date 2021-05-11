<?php

namespace app\core;

class Category extends Dbh
{
    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        return $this->fetch($sql);
    }

    public function getCategory(int $id)
    {
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        return $this->fetch($sql);
    }

    public function addCategory(string $name)
    {
        $sql = "INSERT INTO categories (name) VALUES ('$name')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}