<?php
$codigoCategoria = $_POST["p_codigoCategoria"];
 
require_once '../negocio/Categoria.class.php';
$objCategoria = new Categoria();
 
try {
    $objCategoria->setCodigoCategoria($codigoCategoria);
    if ($objCategoria->eliminar()){
        echo "exito";
    }
} catch (Exception $exc) {
    header("HTTP/1.1 500");
    echo $exc->getMessage();
}


