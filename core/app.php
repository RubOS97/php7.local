<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 11/12/2018
 * Time: 9:24
 */
require_once 'exception/AppException.php';
class app
{
    private static $container = [];

    /**
     * @param string $key
     * @param $value
     */
    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key)
    {
        if (!array_key_exists($key, static::$container))
            throw new AppException("No se ha encontrado la clave $key en el contenedor");
        return static::$container[$key];
    }

    /**
     * @return PDO
     */
    public static function getConnection():PDO
    {
        if(!array_key_exists('connection'
            , static::$container))
            static::$container['connection']=Connection::make();
        return static::$container['connection'];
    }

}