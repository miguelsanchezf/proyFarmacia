<?php

require_once '../negocio/Categoria.class.php';

$codigo = $_POST["p_codigo"];

$objCategoria = new Categoria();
try {
    $resultado = $objCategoria->leerDatos($codigo);
    echo json_encode($resultado);
    //print_r($resultado);
} catch (Exception $exc) {
    header("HTTP/1.1 500");
    echo $exc->getMessage();
}





