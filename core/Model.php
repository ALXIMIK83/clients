<?php


namespace app\core;

use app\DB\DbConnectionManager;


abstract class Model
{
    public $base;

    public function __construct()
    {
        $dbConfig = require __DIR__ . "\..\DB\dbConfig.php";
        $this->base = new DbConnectionManager($dbConfig);
    }

    abstract public function getData();
}
