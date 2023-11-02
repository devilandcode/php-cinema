<?php

namespace App\Kernel\Database;

use App\Kernel\Config\ConfigInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct(
        private ConfigInterface $config
    )
    {
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        $fields = array_keys($data);

        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(fn ($fields) => ":$fields", $fields));

        $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)', $table, $columns, $binds);
        $stm = $this->pdo->prepare($sql);
        try{
        $stm->execute($data);
        } catch(\PDOException $e) {
            return false;
        }

        return (int) $this->pdo->lastInsertId();
    }

    private function connect(): void
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try {
        $this->pdo = new \PDO(sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $driver, $host, $port, $database, $charset),
            $username, $password);
        } catch(\PDOException $e) {
            exit('Connection was failed: ' . $e->getMessage());
        }
    }
}