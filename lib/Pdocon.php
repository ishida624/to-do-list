<?php

namespace Pdocon;

class Pdocon
{
    public $db_link;
    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->db_link = new \PDO("mysql:host={$servername};dbname={$dbname};charset = utf8", $username, $password);

            // set the PDO error mode to exception
            //$db_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
