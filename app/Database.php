<?php

namespace App;
use \PDO;

class Database {
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    public function __construct($db_name, $db_user = 'root', $dp_pass = '', $dp_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $dp_pass;
        $this->db_host = $dp_host;
    }
    
    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=grafikart;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        
        return $pdo;
    }
    
    public function query($statement, $class_name){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }
    
    public function prepare($statement, $value, $class_name, $one){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($value);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        }else {
            $datas = $req->fetchAll();
        }
        
        return $datas;
    }
    
    
}
