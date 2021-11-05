<?php

class Database {

    # Database config
    private $db_host = 'localhost';
    private $db_name = 'sample_db';
    private $db_user = 'root';
    private $db_pass = '';

    # Database connection and instance
    private $connection;
    private static $_instance;

    # Create and get database instance
    public static function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    # Database model constructor and connection
    public function __construct() {
        # Database syntax
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        # Database connection option
        $options = array(
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        # Database connection
        try {
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass, $options);
        } catch (PDOException $e) {
            die('Could not establish database connection : ' . $e->getMessage());
        }
    }

    # Prevent duplicate instances
    private function __clone() {}

    # Get database connection
    public function getConnection() {
        return $this->connection;
    }

}