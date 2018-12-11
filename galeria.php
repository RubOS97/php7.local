<?php
require_once 'utils/utils.php';
require_once 'utils/File.php';
require_once 'entity/ImagenGaleria.php';
require_once 'database/Connection.php';
require_once 'database/QueryBuilder.php';

$errores=[];
$descripcion='';
$mensaje='';
$connection=Connection::make();

if($_SERVER['REQUEST_METHOD' ]==='POST')
{
    try{
    $descripcion=trim(htmlspecialchars($_POST['descripcion']));

    $tiposAceptados=['image/jpeg', 'image/png', 'image/gif'];

    $imagen=new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
    $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

    $sql="INSERT INTO imagenes(nombre, descripcion) 
    VALUES('".$imagen->getFileName()."' ,'$descripcion')";
    if($connection->exec($sql)===false)
        $errores[]="No se ha podido insertar en la BDA";
    else
        $mensaje='Se ha guardado la imagen en la BDA';
    }catch (FileException $fileException){
        $errores[]=$fileException->getMessage();
    }
    $queryBuilder=new QueryBuilder($connection);
    $imagenes=$queryBuilder->findAll('imagenes','ImagenGaleria');
}
require 'views/galeria.view.php';