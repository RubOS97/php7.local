<?php
/**
 * Created by PhpStorm.
 * User: lliurex
 * Date: 07/12/2018
 * Time: 10:33
 */

require_once __DIR__.'/../exception/QueryException.php';
require_once __DIR__.'/../core/app.php';


class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    /**
     * QueryBuilder constructor.
     * @param PDO $connection
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;

    }
    public function findAll(string $table,string $classEntity)
    {
        $sql="SELECT * FROM $table->table";
        //$this->connection->query($sql);
        $pdostatement=$this->connection->prepare($sql);
        if($pdostatement->execute()=== false)
            throw new QueryException("No se ha podido ejecutar la query");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$classEntity);
    }

}