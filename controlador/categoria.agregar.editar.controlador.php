<?php
require_once '../negocio/Categoria.class.php';
require_once '../negocio/Validar.class.php';

parse_str($_POST["p_array_datos"], $datosFrm);

$objCategoria = new Categoria();
$objValidar= new Validar();

if ($datosFrm["txttipooperacion"]=="editar"){
    $objCategoria->setCodigoCategoria($datosFrm["txtcodigo"]);
}
$objCategoria->setDescripcion($datosFrm["txtDescripcion"]);
 
try {
    if ($datosFrm["txttipooperacion"]=="agregar"){
        if($objValidar->solo_letras($objCategoria->getDescripcion())){
            if ($objCategoria->agregarCategoria()==true){
            echo "exito";
        }
    }    else{
        echo 'La descripcion debe contener solo letras';
    }    
    }else{
        if($objValidar->solo_letras($objCategoria->getDescripcion())){
        if ($objCategoria->editar()==true){
            echo "exito";
        }
     } else{
            echo 'La descripcion debe contener solo letras';
            }   
    }
    
} catch (Exception $ex) {
    header("HTTP/1.1 500");
    echo $ex->getMessage();
}





