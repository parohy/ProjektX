<?php

/**
 * Created by PhpStorm.
 * User: Matúš Kaèmár
 * Date: 8. 11. 2015
 * Time: 12:00
 */

class DBHandler
{
    private $dbHost = "localhost";
    private $dbName;
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbHandler;
    private $error;
    private $statement;

    public function __construct($dbName) {
        $this->dbName = $dbName;

        $dbSourceName = 'mysql:host' . $this->dbHost . ';dbname=' . $this->dbName;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        try {

            $this->dbHandler = new PDO($dbSourceName,$this->dbUser, $this->dbPassword, $options);

        } catch(PDOException $e) {

            $this->error = $e->getMessage();

        }
    }

    // PREPARE QUERY
    public function query($query) {
        $this->statement = $this->dbHandler->prepare($query);
    }

    // BIND VALUES TO PARAMETERS IN QUERY
    public function bind($parameters, $value, $type=null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

            $this->statement->bindValue($parameters, $value, $type);
        }
    }

    // EXECUTE THE SATATEMENT
    public function execute() {
        return $this->statement->execute();
    }

    // FUNCTION RETURNS RESULT SET ROWS
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // RETURN SINGLE RECORD FROM THE TABLE
    public function singleRecord() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    // RETURN NUMBER OF AFFECTED ROWS BY PREVIOUS ACTION
    public function rowCount() {
        return $this->statement->rowCount();
    }

    // RETURNS THE LAST INSERTED ID AS STRING
    public function lastInsertId() {
        return $this->dbHandler->lastInsertId();
    }

    // BEGIN TRANSATCTION TO RUN MULTIPLE CHANGES IN DB AT ONCE
    public function beginTransaction(){
        return $this->dbHandler->beginTransaction();
    }

    // END TRANSATCTION
    public function endTransaction(){
        return $this->dbHandler->commit();
    }

    // CANCEL TRANSATCTION
    public function cancelTransaction(){
        return $this->dbHandler->rollBack();
    }

    // GET RID OF BINDED PARAMETERS OF PREPARED STATEMENT
    public function dumpStatementParams(){
        return $this->statement->debugDumpParams();
    }
}