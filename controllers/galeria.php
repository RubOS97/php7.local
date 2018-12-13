<?php
require_once __DIR__ . '/../utils/utils.php';
require_once __DIR__ . '/../utils/File.php';
require_once __DIR__ . '/../entity/ImagenGaleria.php';
require_once __DIR__ . '/../database/Connection.php';
require_once __DIR__ . '/../repository/ImagenGaleriaRepository.php';
require_once __DIR__ . '/../core/app.php';
require_once __DIR__ . '/../exception/FileException.php';
require_once __DIR__ . '/../exception/QueryException.php';

$errores=[];
$descripcion='';
$mensaje='';
try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);
    $imagenGaleriaRepository = new ImagenGaleriaRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];

        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion);
        $imagenGaleriaRepository->save($imagenGaleria);
        $mensaje = 'Imagen guardada correctamente';
        $descripcion = '';
    }
    $imagenes = $imagenGaleriaRepository->findAll();
}catch (QueryException $exception){
    throw new QueryException('Error de Base de datos');
}catch (FileException $exception){
    throw new FileException('Error al insertar el fichero');
}
require __DIR__ . '/../views/galeria.view.php';