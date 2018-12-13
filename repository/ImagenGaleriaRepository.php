<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 13/12/2018
 * Time: 12:13
 */
require_once __DIR__ . '/../database/QueryBuilder.php';

class ImagenGaleriaRepository extends QueryBuilder {


    /**
     * ImagenGaleriaRepository constructor.
     */
    public function __construct(string $table = 'imagenes', string $classEntity = 'ImagenGaleria') {
        parent::__construct($table, $classEntity);
    }
}