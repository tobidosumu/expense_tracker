<?php
class DbConnect
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    //initializes object properties when object is created
    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        //opens connection to the db
        $this->connection = new mysqli($this->host, $this->username, $password, $this->database);

        return $this;
    }

    public function query($queryString)
    {
        $result = $this->connection->query($queryString);

        if ($this->connection->error) exit($this->connection->error);

        return $result;
    }
}

require "./require/dbParam.require.php";

$dbConn = new DbConnect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
