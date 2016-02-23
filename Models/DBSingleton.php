<?php //namespace Models;

class DBSingleton 
{
    private $db;
    static $instance;

    private function __construct() {
        $db_username = "root";
        $db_password = "";
        $this->db = new PDO("mysql:host=localhost;dbname=sia", $db_username, $db_password,array('charset'=>'utf8'));
        $this->db->query("SET CHARACTER SET utf8");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //private function __clone(){}

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getDB(){
        return $this->db;
    } 
}