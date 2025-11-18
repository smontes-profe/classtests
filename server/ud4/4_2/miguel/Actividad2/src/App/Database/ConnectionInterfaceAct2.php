<?php

namespace App\Database;

use PDO;

interface ConnectionInterfaceAct2 {
    public function getConnection(): PDO;
}
