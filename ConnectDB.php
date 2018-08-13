<?php
/*
* Class de conexão ao banco de dados com PDO
*/
require_once "Config.php";

class ConnectDB extends Config {
    
    private $db_host, $db_user, $db_pass, $db_base;
    
    public function __construct() {
        $this->db_host = self::DB_HOST;
        $this->db_user = self::DB_USER;
        $this->db_pass = self::DB_PASS;
        $this->db_base = self::DB_BASE;
    }
    
    public function returnConnection() {
        try {
            $this->connect();
        } catch(PDOException $e) {
            exit("Falha no acesso ao banco de dados. " . $e->getMessage());
        }
    }
    
    private function connect() {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        $link = new PDO("mysql:host={$this->db_host};dbname={$this->db_base}", $this->db_user, $this->db_pass, $options);
        return $link;
    }
    
}

$conn = new ConnectDB();
$conn->returnConnection();