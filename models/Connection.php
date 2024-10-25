<?php
namespace Model;
use \PDO;

final class Connection {
    private $connection;
    public function __construct() {
        $this->connection = new PDO("mysql:host=".HOST.";dbname=". BASE, USER, PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function select($query, $binds = []) {
        $statement = $this->connection->prepare($query);
        foreach ($binds as $bind_name => $bind) {
            $statement->bindValue(":$bind_name", $bind);
        }
        $statement->execute();
        return $statement->fetchAll();
    }
    public function execute($query, $binds = []) {
        $statement = $this->connection->prepare($query);
        foreach ($binds as $bind_name => $bind) {
            $statement->bindValue(":$bind_name", $bind);
        }
        return $statement->execute();
    }
    public function getLastInsertId() {
        return $this->connection->lastInsertId();
    }
    public function __destruct() {
        $this->connection = null;
    }
}