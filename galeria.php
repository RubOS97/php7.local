<?php
require_once __DIR__.'../exceptions/FileException.php';
require_once 'utils/utils.php';
require_once 'utils/File.php';
require_once 'entity/ImagenGaleria.php';
$errores = [];
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tipoImagen = ['image/jpeg', 'image/png', 'image/gif'];
        $imagen = new File('imagen', $tipoImagen);
        $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        $mensaje = 'Imagen guardada';
    }catch (FileException $fileException){
        $errores[] = $fileException->getMessage();
    }

}
require 'views/galeria.view.php';