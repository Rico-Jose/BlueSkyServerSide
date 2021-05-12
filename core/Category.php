<?php

namespace app\core;

class Category extends Dbh
{
    private int $id;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->addCategory($this);
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}