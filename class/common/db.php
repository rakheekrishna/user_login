<?php
class Db{
    protected function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "root@123";
        $db = "db_mywebapp";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            return $conn;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
