<?php
/**
 * Created by PhpStorm.
 * User: Pauessa
 * Date: 29/11/2018
 * Time: 11:57
 */

class ImagenGaleria
{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALERY = 'images/index/gallery/';

    /**
     * @var  string
     */
    private $nombre;
    /**
     * @var  string
     */
    private $descripcion;
    /**
     * @var  integer
     */
    private $numVisualizaciones;
    /**
     * @var  integer
     */
    private $numLikes;
    /**
     * @var  integer
     */
    private $numDownloads;

    /**
     * ImagenGaleria constructor.
     * @param string $nombre
     * @param string $descripcion
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct(string $nombre, string $descripcion, int $numVisualizaciones=0, int $numLikes=0, int $numDownloads=0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDescripcion();
        // TODO: Implement __toString() method.
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
     * @return ImagenGaleria
     */
    public function setNombre(string $nombre): ImagenGaleria
    {
        $this->nombre = $nombre;
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
     * @return ImagenGaleria
     */
    public function setDescripcion(string $descripcion): ImagenGaleria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     * @return ImagenGaleria
     */
    public function setNumVisualizaciones(int $numVisualizaciones): ImagenGaleria
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     * @return ImagenGaleria
     */
    public function setNumLikes(int $numLikes): ImagenGaleria
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     * @return ImagenGaleria
     */
    public function setNumDownloads(int $numDownloads): ImagenGaleria
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    /**
     * @return string
     */
    public function  getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
    }

    /**
     * @return string
     */
    public function  getUrlGallery(): string
    {
        return self::RUTA_IMAGENES_GALERY.$this->getNombre();
    }

}