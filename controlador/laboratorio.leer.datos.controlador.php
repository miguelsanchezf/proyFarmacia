<?php

require_once '../negocio/Laboratorio.class.php';

$codigo = $_POST["p_codigo"];

$objLaboratorio = new Laboratorio();
try {
    $resultado = $objLaboratorio->leerDatos($codigo);
    echo json_encode($resultado);
    //print_r($resultado);
} catch (Exception $exc) {
    header("HTTP/1.1 500");
    echo $exc->getMessage();
}





