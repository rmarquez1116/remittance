<?php
if (!defined('DB_SERVER')) {
    require_once("../initialize.php");
}
class DBConnection
{

    private $host = DB_SERVER;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    private $port = DB_PORT;

    public $conn;

    public function __construct()
    {

        if (!isset($this->conn)) {

            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
                //code...
            } catch (\Throwable $th) {
                printf($th);
                //throw $th;
            }

            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }
        }
    }
    public function __destruct()
    {  
        $this->conn->close();
    }
}
