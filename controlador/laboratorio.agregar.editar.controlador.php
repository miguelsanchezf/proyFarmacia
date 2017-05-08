<?php
require_once '../negocio/Laboratorio.class.php';
require_once '../negocio/Validar.class.php';

parse_str($_POST["p_array_datos"], $datosFrm);

$objLaboratorio = new Laboratorio();
$objValidar= new Validar();

if ($datosFrm["txttipooperacion"]=="editar"){
    $objLaboratorio->setCodigoLaboratorio($datosFrm["txtcodigo"]);
}
$objLaboratorio->setNombre($datosFrm["txtNombre"]);
$objLaboratorio->setDireccion($datosFrm["txtDireccion"]);
$objLaboratorio->setTelefono($datosFrm["txtTelefono"]);
 
try {
    if ($datosFrm["txttipooperacion"]=="agregar"){
        if($objValidar->solo_letras($objLaboratorio->getNombre())){
            if ($objLaboratorio->agregarLaboratorio()==true){
            echo "exito";
        }
    }    else{
        echo 'El laboratorio debe contener solo letras';
    }    
    }else{
        if($objValidar->solo_letras($objLaboratorio->getNombre())){
        if ($objLaboratorio->editar()==true){
            echo "exito";
        }
     } else{
            echo 'El laboratorio debe contener solo letras';
            }   
    }
    
} catch (Exception $ex) {
    header("HTTP/1.1 500");
    echo $ex->getMessage();
}





