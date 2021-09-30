<?php

class DbManager {

    // แบบไม่มีการกำหนด user และ pass
    // private $host = "localhost";
    // private $port = "27017";

    // แบบกำหนด username และ password
    private $host = "localhost";
    private $port = "27017";
    private $userdb = "samit";
    private $passdb = "123456";
    private $dbname = "phpeventdb";
    private $conn;

    // แบบเชื่อมต่อไปที่ Atlas cluster
    // private $host = "cluster0.fi3ys.mongodb.net";
    // private $userdb = "samit";
    // private $passdb = "xxxx";
    // private $conn;

    function __construct(){

        // Connecting to MongoDB แบบไม่มี username และ password
        // try{
        //     $this->conn = new MongoDB\Driver\Manager('mongodb://'.$this->host.':'.$this->port);
        // }catch(MongoDBDriverExceptionException $e){
        //     echo $e->getMessage();
        //     echo nl2br("n");
        // }
        
        // Connecting to MongoDB แบบมี username และ password
        try{
            // mongodb://samit:123456@localhost:27017/phpeventdb
            $this->conn = new MongoDB\Driver\Manager(
                'mongodb://'.$this->userdb.':'.$this->passdb.'@'.$this->host.':'.$this->port.'/'.$this->dbname
            );
        }catch(MongoDBDriverExceptionException $e){
            echo $e->getMessage();
            echo nl2br("n");
        }

        // Connecting to MongoDB atlas
        // try{
        //     $this->conn = new MongoDB\Driver\Manager('mongodb+srv://'.$this->userdb.':'.$this->passdb.'@'.$this->host);
        // }catch(MongoDBDriverExceptionException $e){
        //     echo $e->getMessage();
        //     echo nl2br("n");
        // }

    }

    function getConnection(){
        return $this->conn;
    }

}
