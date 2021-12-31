<?php

namespace App\Models;

use Db\Database;

class Users
{
    private $pdo;
    private int $id;
    private ?string $name;

    public function __set($name, $value)
    {
    }

    public function __construct()
    {
        $this->pdo = Database::getDatabase();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return ucwords($this->name, " -");
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function persist($name)
    {
        $this->setName($name);

        $stmt = $this->pdo->prepare('INSERT INTO users (name) VALUES (?)');
        $stmt->execute([$this->getName()]);
    }
}
