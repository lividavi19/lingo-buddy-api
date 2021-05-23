<?php
    class DB {
        private $host = '';
        private $user = '';
        private $database = '';
        private $password = '';
        private $connection = '';

        // constructor
        function __construct ($host='localhost', $user='id16797763_lividavi', $database='id16797763_lang_app', $password='Living@191194') {
            $this->host = $host;
            $this->user = $user;
            $this->database = $database;
            $this->password = $password;

            // creating the databse connection
            $this->createConnection();
        }

        // create database connection
        private function createConnection (){
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        // check for database connection
        function connectionOk () {
            return $this->connection->connect_errno === 0;
        }

        // get database connection
        function getConnection () {
            if (!$this->connectionOk()) {
                require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_helpers.php';
                $Json = new Json();
                $Json->printJson(
                    [
                        'successs' => false,
                        'message' => 'error database connection'
                    ]
                );
            }
            return $this->connection;
        }
    }
?>