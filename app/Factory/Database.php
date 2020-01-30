<?php

namespace App\Factory;

class Database {

    private $hostname = 'localhost';
    private $port = 3306;
    private $dbname = 'polivalencia';
    private $username = 'root';
    private $pwd = '';
    private $charset = 'utf8mb4';

    public function __construct() {
    }

    public function connect() {

        $options = [
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_DIRECT_QUERY => false,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];

        $dsn = "mysql:host=$this->hostname:$this->port;dbname=$this->dbname;$this->charset";
        //        $sqlserver = "sqlsrv:server=$this->hostname; Database=$this->dbname";

        try {
            $pdo = new \PDO($dsn, $this->username, $this->pwd, $options);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }
}
