<?php

require 'vendor/autoload.php';

use App\Models\UserModel;
use Db\Database;

$userModel = new UserModel();

$users = $userModel->findAll();

echo "<pre>";
// var_dump($users);

foreach ($users as $user) {
    // var_dump(get_object_vars($user));
    $u = $user->findOneByName('jean bat');
    var_dump($u);
}
