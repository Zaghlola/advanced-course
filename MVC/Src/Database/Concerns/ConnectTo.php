<?php
namespace Src\Database\Concerns;

use Src\Database\Mangers\Contracts\DatabaseManger;

class ConnectTo{
    public static function connect(DatabaseManger $databaseManger)
    {
        return $databaseManger->connect();
    }
}