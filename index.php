<?php

require 'vendor/autoload.php';

use Db\Database;
use App\models\Users;

$pdo = Database::getDatabase();

// $sql = "CREATE TABLE users (
//             id INTEGER PRIMARY KEY,
//             name TEXT NOT NULL
//     )";

// $statement = $pdo->prepare($sql);
// $statement->execute();

// $statement = $pdo->prepare('INSERT INTO users (name) VALUES (?)');
// $statement->execute(['manon']);

$userModel = new Users();

$userModel->persist('jean-christophe');

$statement = $pdo->prepare('SELECT * FROM users');
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_CLASS, 'App\\models\\Users');
echo "<pre>";
var_dump($users);

foreach ($users as $user) {
    echo $user->getName() . "<br />";
}
