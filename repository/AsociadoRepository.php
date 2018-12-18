<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 13/12/2018
 * Time: 12:13
 */
require_once __DIR__ . '/../database/QueryBuilder.php';

class AsociadoRepository extends QueryBuilder {

    /**
     * AsociadoRepository constructor.
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'asociados', string $classEntity = 'Asociado') {
        parent::__construct($table, $classEntity);
    }
}