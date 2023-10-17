<?php 
class Db{

    private $dbhost = "localhost";
    private $dbname = "test";
    private $dbuser = "root";
    private $dbpwd = "";

    protected function connect(){
        $dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;
        try {
            $pdo = new PDO($dsn, $this->dbuser, $this->dbpwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo 'PDO connected successfully.'; // Debug statement
            return $pdo;
        } catch (PDOException $e) {
            // echo 'PDO connection failed: ' . $e->getMessage(); // Debug statement
            return null;
        }
    }

    protected function a(){
        return 'awit';
    }
}