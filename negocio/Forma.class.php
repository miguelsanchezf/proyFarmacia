<?php

require_once '../datos/conexion.php';

class Forma  extends Conexion{
    
    private $codigoForma;
    private $descripcion;
    
    function getCodigoForma() {
        return $this->codigoForma;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigoForma($codigoForma) {
        $this->codigoForma = $codigoForma;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
     public function listarForma() {
       try {
                $sql = "SELECT * from forma";
            
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            } 
    }


}
