<?php 

namespace App\Persistence;

class ConnectionFactory
{

    private $_conn;
    private $_user = "root";
    private $_pass = "";
    private $_dbname = "conexaophp";
    private $_host = "localhost";

    // https://www.php.net/manual/en/pdo/connections.php
    function __construct()
    {}

    public function getInstance()
    {
        try {
            if (!isset($this->_conn)){
                $this->_conn = new \PDO("mysql:host=localhost; dbname=conexaophp; charset=UTF8", "root", "");
                return $this->_conn;
            }else{
                return $this->_conn;
            } 
        } catch (\PDOException $e) {
                $e->getMessage();
        }
    } // public void
} // class