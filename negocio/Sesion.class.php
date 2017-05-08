<?php

require_once '../datos/conexion.php';

class Sesion extends Conexion {
    private $email;
    private $clave;
    private $recordar;
    
    public function getRecordar() {
        return $this->recordar;
    }

    public function setRecordar($recordar) {
        $this->recordar = $recordar;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

        
    public function iniciarSesion() {
        try {
            $sql = "
                   select clave, estado,apellidoPaterno,apellidoMaterno,nombres from usuario where usuario = :p_email
                   ";
 
            $sentecia = $this->dblink->prepare($sql);
            $sentecia->bindParam(":p_email", $this->getEmail());
            $sentecia->execute();
            $resultado = $sentecia->fetch();

//            if ($resultado["clave"] == md5($this->getClave())){
            if ($resultado["clave"] == ($this->getClave())){
                if ($resultado["estado"] == "I"){
                    return 2;
                }else{
                    session_name("Sistema-Farmacia");
                    session_start();
                    $_SESSION["usuario"] = $resultado["apellidoPaterno"].' '.$resultado["nombres"];
//                    $_SESSION["cargo"] = $resultado["cargo"];
 
                    if ($this->getRecordar()=="S"){
                        setcookie("usuario", $this->getEmail(), 0, "/");
                    }else{
                        setcookie("usuario", "", 0, "/");
                    }                     
                    return 1;
                }
            }

            return -1;
        } catch (Exception $exc) {
            throw $exc;
        }
    }


    
}
