<?php

namespace App\Models;

use PDO;
use App\Models\Utils\AbstractModel;

class UserModel extends AbstractModel
{
    private int $id;
    public ?string $name;

    public function __set($name, $value)
    {
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
        $this->name = strtolower($name);
        return $this;
    }

    public function findAll()
    {
        $statement = $this->pdo->prepare("SELECT * FROM users");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'App\\models\\UserModel');
    }

    public function findOneByName($name)
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE name=?");
        $statement->execute([$name]);

        return $statement->fetch();
    }

    public function persist($userData)
    {
        $this->setName($userData['name']);

        $stmt = $this->pdo->prepare('INSERT INTO users (name) VALUES (?)');
        $stmt->execute([$this->name]);
    }
}
