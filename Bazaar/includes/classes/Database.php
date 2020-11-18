<?php

    class Database{

        // variables --------------------------------------------------------------
        private $host;
        private $username;
        private $password;
        private $dbName;
        private $DSN;
        public $pdo;

        // constructor --------------------------------------------------------------
        function Database($host, $username, $password, $dbName){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->dbName = $dbName;
            $this->DSN = "mysql:host=". $this->host . "; dbname=". $this->dbName;
        }

        // getter & setter -------------------------------------------------------------------
        
        // host
        function getHost(){
            return $this->host;
        }
        function setHost($host): void {
            $this->host = $host;
        }

        // username
        function getUsername(){
            return $this->username;
        }
        function setUsername($username): void {
            $this->username = $username;
        }

        // password
        function getPassword(){
            return $this->password;
        }
        function setPassword($password): void {
            $this->password = $password;
        }

        // databaseName
        function getDatabaseName(){
            return $this->databaseName;
        }
        function setDatabaseName($dbName): void {
            $this->dbName = $dbName;
        }
        
        // DSN
        function getDSN() {
            return $this->DSN;
        }

        function setDSN($DSN): void {
            $this->DSN = $DSN;
        }
        
        // connact
        function startConnact(){
            try{
                $this->pdo = new PDO($this->getDSN(), $this->getUsername(), $this->getPassword());
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->pdo;
            } catch (Exception $ex) {
                echo 'Coonaction failed: '. $ex->getMessage();
            }
        }
        
        function finishConnact(){
            $this->pdo = null;
        }
        
        function setDeafultFetchAsObject($pdo){
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        
        function setDeafultFetchAsArray($pdo){
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
        }


        function exe($statement, $pdo){
            $stmt = $pdo->prepare($statement);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }
        
    }    


?>
