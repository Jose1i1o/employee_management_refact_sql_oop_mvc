<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        $this->host = $_SERVER['HTTP_HOST'];
        $this->db = "employeemngmt";
        $this->user = "root";
        $this->password = "";
        // $this->host = $_SERVER['HTTP_HOST'];
        // $this->db = "employeemngmt";
        // $this->user = "root";
        // $this->password = "";
    }

    public function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO($connection, $this->user, $this->password, $options);
            return $this->pdo;
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}
