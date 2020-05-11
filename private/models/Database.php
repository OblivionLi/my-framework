<?php

class Database {
    // DB params
    private $host = 'localhost';
    private $db_name = 'database-name-here';
    private $user = 'root';
    private $pass = '';
    private $conn;

    // DB connect
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage(); // message used only for development process
        }

        return $this->conn;
    }
}