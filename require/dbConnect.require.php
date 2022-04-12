<?php
class DbConnect {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    //reconciles properties with addCat.inc.php form inputs
    public function __construct($host,$username,$password,$database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        //opens connection to the db via parameters and makes connection readily available when called(return)
        $this->connection = new mysqli($this->host,$this->username,$password,$this->database);
        
        return $this;
    }

    public function query($queryString) {
        return $this->connection->query($queryString);
    }
}

require "./require/dbParam.require.php";

$dbConn = new DbConnect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);