<?php

namespace App\Library;

use mysqli;

class Database
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private object $connection;

    public function __construct()
    {
        $environments = $this->load();

        try {

            $this->host = $environments['host'];
            $this->username = $environments['username'];
            $this->password = $environments['password'];
            $this->database = $environments['database'];

            $this->connection = $this->connectionOpen();

            if (!$this->connection) {

                throw new \Exception('Connection failed');

            }

        } catch (\Exception $exception) {

            echo $exception->getMessage();

        }
    }

    public function connectionOpen(): object
    {
        return new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
    }

    public function load()
    {
        $in = __DIR__ . '/../Config/database.php';
        if (is_file($in)) {
            return include $in;
        }
        return false;
    }

    public function __destruct()
    {
        // Close the MySQL database connection in the destructor
        $this->connectionClose();
    }

    private function connectionClose(): void
    {
        $this->connection?->close();
    }

}