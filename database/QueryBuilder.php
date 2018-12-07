<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 07/12/2018
 * Time: 11:33
 */

class QueryBuilder{

    private $connection;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    public function findAll(string $table, string $classEntity){
        $sql="SELECT * FROM $table";
        //$this->connection-query($sql);
        $pdostatement=$this->connection->prepare($sql);
        if ($pdostatement->execute() === false)
            throw new QueryException("No se ejecutar la sentencia");
        return $pdostatement->fetchAll('PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE', $classEntity);

    }

}