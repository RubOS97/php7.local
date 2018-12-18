<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 18/12/2018
 * Time: 8:21
 */
require_once __DIR__ . '/../database/IEntity.php';

class Asociado implements iEntity{

    const RUTA_IMAGENES_ASOCIADOS ='../images/asociados/';

    private $id_asociado;
    private $nombre;
    private $imagen;
    private $descripcion;

    /**
     * Asociado constructor.
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */
    public function __construct(string $nombre = "", string $imagen = "", string $descripcion = "")
    {
        $this->id_asociado = null;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    /**
     * @return null
     */
    public function getIdAsociado()
    {
        return $this->id_asociado;
    }

    /**
     * @param null $id_asociado
     * @return Asociado
     */
    public function setIdAsociado($id_asociado)
    {
        $this->id_asociado = $id_asociado;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     * @return Asociado
     */
    public function setImagen(string $imagen): Asociado
    {
        $this->imagen = $imagen;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlAsociado() : string
    {
        return self::RUTA_IMAGENES_ASOCIADOS . $this->getImagen();
    }


    /**
     * @return array
     */
    public function toArray(): array{
        return[
            'nombre'=>$this->getNombre(),
            'imagen'=>$this->getImagen(),
            'descripcion'=>$this->getDescripcion(),
        ];
    }
}