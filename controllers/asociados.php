<?php
require_once __DIR__ . '/../utils/utils.php';
require_once __DIR__ . '/../utils/File.php';
require_once __DIR__ . '/../entity/Asociado.php';
require_once __DIR__ . '/../database/Connection.php';
require_once __DIR__ . '/../repository/AsociadoRepository.php';
require_once __DIR__ . '/../core/app.php';
require_once __DIR__ . '/../exception/FileException.php';
require_once __DIR__ . '/../exception/QueryException.php';

$errores=[];
$descripcion='';
$mensaje='';
try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);
    $asociadoRepository = new AsociadoRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $nombre = trim(htmlspecialchars($_POST['nombre']));

        $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];

        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(Asociado::RUTA_IMAGENES_ASOCIADOS);

        $asociado = new Asociado($nombre, $imagen->getFileName(), $descripcion );
        $asociadoRepository->save($asociado);
        $mensaje = 'Asociado guardado correctamente';
        $descripcion = '';
        $nombre = '';
    }
    $asociados = $asociadoRepository->findAll();
}catch (QueryException $exception){
    throw new QueryException('Error de Base de datos');
}catch (FileException $exception){
    throw new FileException('Error al insertar el fichero');
}
require __DIR__ . '/../views/asociados.view.php';