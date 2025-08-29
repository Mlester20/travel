<?php
    //configure connections
    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "travel_blog";
        private $conn;

        public function __construct()
        {
            $this->connect();
        }

        public function connect(){
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
        }

        public function getConnection(){
            return $this->conn;
        }
    }

    //sample usage
    $db = new Database();
    $con = $db->getConnection();
?>