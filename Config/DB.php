<?php 
    class DB {
        private $host = "127.0.0.1";
        private $dbname = "myjobs";
        private $username =  "root";
        private $password = "";

        public $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";port=3307;dbname=". $this->dbname . ";charset=utf8mb4;"
                    ,$this->username, $this->password
                );

                // echo json_encode(["message" => "Connection successful"]);
            } catch(PDOException $e) {
                http_response_code(500);
                echo json_encode([ "message" => "Connectiotn Error: " . $e->getMessage()]);
            }

            return $this->conn;
        }
    }
?>