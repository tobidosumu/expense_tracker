<?php
    class DbConnect {
        private $dbHost = "localhost";
        private $username = "root";
        private $password = "";
        private $dbName = "expensetracker";

        protected function connect() {
            $dsn = 'mysql:servername='. $this->dbHost . ';dbName='. $this->dbName;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
            // if($pdo = 3) {
            //     echo "successfully connected to db!";
            // } else {
            //     echo "connection failed.";
            // }
        }
    }
?>