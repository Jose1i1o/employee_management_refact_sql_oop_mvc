<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $stmt;

    public function __construct()
    {
        $this->host = $_SERVER['HTTP_HOST'];
        $this->db = "employeemngmt";
        $this->user = "root";
        $this->password = "";
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
    //Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }
    //Bind params
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    //Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Return a set of data
    public function dataSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Single data
    public function singleData()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}