<?php

require_once '../datos/conexion.php';

class Usuario extends Conexion {
    
    private $codigoUsuario;
    private $nombres; 
    private $apellidoPaterno; 
    private $apellidoMaterno; 
    private $usuario; 
    private $clave; 
    private $estado;
    private $tipoUsuario; 
    
    function getCodigoCategoria() {
        return $this->codigoCategoria;
    }
 
    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigoCategoria($codigoCategoria) {
        $this->codigoCategoria = $codigoCategoria;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function listarCategoria() {
       try {
                $sql = "SELECT codigoCategoria, descripcion from categoria";
            
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            } 
    }
    
    public function agregarCategoria() {
        $this->dblink->beginTransaction();
        
        try {
            $sql = "select numero+1 as nc from correlativo where tabla = 'categoria'";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            
            if ($sentencia->rowCount()){
                $nuevoCodigo = $resultado["nc"];
                $this->setCodigoCategoria($nuevoCodigo);
                
                $sql = "insert into categoria("
                        . "codigoCategoria,"                       
                        . "descripcion)"
                        . " values(:p_cc, :p_dc)";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cc", $this->getCodigoCategoria());
                $sentencia->bindParam(":p_dc", $this->getDescripcion());              
                $sentencia->execute();
                
                $sql = "update correlativo set numero = numero + 1 where tabla = 'categoria'";
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
             
            $sql = "update categoria "
                    . "set "                   
                    . "descripcion = :p_dc "
                    . "where "
                    . "codigoCategoria = :p_cc";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cc", $this->getCodigoCategoria());
            $sentencia->bindParam(":p_dc", $this->getDescripcion());           
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
            $sql = "select codigoCategoria,descripcion from categoria where codigoCategoria= :p_cc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cc", $codigo);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }            
    }
    
     public function eliminar() {
        try {
            $sql = "delete from categoria where codigoCategoria = :p_cc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cc", $this->getCodigoCategoria());
            $sentencia->execute();
        } catch (Exception $exc) {
            throw $exc;
        }
        
        return true;
    }

  
}
