<?php 
    
    class Database{
        private $localhost;
        private $database;
        private $username;
        private $password;

        public $connection;

        function __construct()
        {
            $this->localhost = "localhost";
            $this->database = "daftar_tugas";
            $this->username = "root";
            $this->password = "";
        }

        public function getConnection()
        {
            $this->connection = null;

            try {
                $this->connection = new PDO(
                                        "mysql:host=".$this->localhost.";
                                        dbname=".$this->database, $this->username, $this->password
                                    );
                                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo 'failed connection to the database : ' . $e->getMessage();
            }

            return $this->connection;
        }
    }
?>