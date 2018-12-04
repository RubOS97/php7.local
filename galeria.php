<?php
$errores = [];
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD' === 'POST']){
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
}

require 'views/galeria.view.php';