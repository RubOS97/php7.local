<?php
    require 'entity/ImagenGaleria.php';
    $imagenes=[];
    for ($i=1; $i<=12; $i++){
        $im=new ImagenGaleria($i.'.jpg', 'descripcion imagen '.$i, $i, $i, $i);
        //echo $im->getNombre();
        $imagenes[$i] = $im;
        //echo $imagenes[$i]->getNombre();
    }
    require 'utils/utils.php';
    require 'views/index.view.php';