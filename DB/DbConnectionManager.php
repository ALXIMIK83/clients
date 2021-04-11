<?php


namespace app\DB;


class DbConnectionManager
{
    /**
     * @var mysqli
     */
    public $db;


    public function __construct($appConfig)
    {
        $this->connectionParam = $appConfig['connection']['params'];
        $this->db = $this->connect();

        if (\mysqli_connect_errno()) {
            throw new \Exception(\sprintf("Connect failed: %s\n", \mysqli_connect_error()));
        }
    }


    private function connect()
    {
        $this->db = new \mysqli(
            $this->connectionParam['host'],
            $this->connectionParam['user'],
            $this->connectionParam['password'],
            $this->connectionParam['dbname']
        );
        return $this->db;
    }

    public function getConnection()
    {
        return $this->db;
    }
}
