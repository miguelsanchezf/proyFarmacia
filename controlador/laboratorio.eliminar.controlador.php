<?php

$codigoLaboratorio = $_POST["p_codigoLaboratorio"];
 
require_once '../negocio/Laboratorio.class.php';
$objLaboratorio = new Laboratorio();
 
try {
    $objLaboratorio->setCodigoLaboratorio($codigoLaboratorio);
    if ($objLaboratorio->eliminar()){
        echo "exito";
    }
} catch (Exception $exc) {
    header("HTTP/1.1 500");
    echo $exc->getMessage();
}


