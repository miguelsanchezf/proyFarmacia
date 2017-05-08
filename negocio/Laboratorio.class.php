<?php

require_once '../datos/conexion.php';

class Laboratorio extends Conexion{
    
    private $codigoLaboratorio;
    private $nombre;
    private $direccion;
    private $telefono;
     
    function getCodigoLaboratorio() {
        return $this->codigoLaboratorio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setCodigoLaboratorio($codigoLaboratorio) {
        $this->codigoLaboratorio = $codigoLaboratorio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
     public function listarLaboratorio() {
       try {
                $sql = "SELECT codigoLaboratorio, nombre,direccion,telefono from laboratorio";
            
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            } 
    }
    
    public function agregarLaboratorio() {
        $this->dblink->beginTransaction();
        
        try {
            $sql = "select numero+1 as nc from correlativo where tabla = 'laboratorio'";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            
            if ($sentencia->rowCount()){
                $nuevoCodigo = $resultado["nc"];
                $this->setCodigoLaboratorio($nuevoCodigo);
                
                $sql = "insert into laboratorio("
                        . "codigoLaboratorio,"                       
                        . "nombre,"                       
                        . "direccion,"                       
                        . "telefono)"
                        . " values(:p_cl, :p_no,:p_dir,:p_tel)";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cl", $this->getCodigoLaboratorio());
                $sentencia->bindParam(":p_no", $this->getNombre());
                $sentencia->bindParam(":p_dir", $this->getDireccion());
                $sentencia->bindParam(":p_tel", $this->getTelefono());              
                $sentencia->execute();
                
                $sql = "update correlativo set numero = numero + 1 where tabla = 'laboratorio'";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                
                $this->dblink->commit();
                
            }
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }       
        return true;        
    }
    
    public function editar() {
        $this->dblink->beginTransaction();
        
        try {
             
            $sql = "update laboratorio "
                    . "set "                   
                    . "nombre = :p_no,"
                    . "direccion = :p_dir,"
                    . "telefono = :p_tel "
                    . " where "
                    . "codigoLaboratorio = :p_cl";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cl", $this->getCodigoLaboratorio());
            $sentencia->bindParam(":p_no", $this->getNombre());           
            $sentencia->bindParam(":p_dir", $this->getDireccion());           
            $sentencia->bindParam(":p_tel", $this->getTelefono());           
            $sentencia->execute();

            $this->dblink->commit();
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }        
        return true;        
    }
    
    public function leerDatos($codigo) {
        try {
            $sql = "select codigoLaboratorio,nombre,direccion,telefono from laboratorio where codigoLaboratorio= :p_cl";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cl", $codigo);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }            
    }
    
     public function eliminar() {
        try {
            $sql = "delete from laboratorio where codigoLaboratorio = :p_cc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cc", $this->getCodigoLaboratorio());
            $sentencia->execute();
        } catch (Exception $exc) {
            throw $exc;
        }
        
        return true;
    }
    
}
