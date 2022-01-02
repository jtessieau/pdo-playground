<?php

namespace App\Models\Utils;

use Db\Database;

class AbstractModel

{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getDatabase();
    }
}
