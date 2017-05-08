<?php


class Validar {
   
    function solo_letras($cadena){ 
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ "; 
    for ($i=0; $i<strlen($cadena); $i++){ 
    if (strpos($permitidos, substr($cadena,$i,1))===false){ 
    //no es válido; 
    return false; 
    } 
    }  
    //si estoy aqui es que todos los caracteres son validos 
    return true; 
    } 
    
    function descripcion($cadena){ 
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.,:;¡!¿?"; 
    for ($i=0; $i<strlen($cadena); $i++){ 
    if (strpos($permitidos, substr($cadena,$i,1))===false){ 
    //no es válido; 
    return false; 
    } 
    }  
    //si estoy aqui es que todos los caracteres son validos 
    return true; 
    }
    
    function dni($dni){ 
   //compruebo que el tamaño del string sea válido. 
   if ( is_numeric($dni) && strlen($dni)==8 && $dni!=00000000){ 
     // echo $dni . " no es válido<br>"; 
      return true; 
     } else{
         return false;
     }
   }
   
   function validar_edad($numero){
       if($numero>0 && $numero<100){ 
           return true;
    } else{
        return false;
    }
  }
   
   function validar_clave($numero){
       if(strlen($numero)>7 && strlen($numero)<15){  
           return true;
    } else{
        return false;
    }
  }
  
}
