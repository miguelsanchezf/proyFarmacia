
function listar(){       
    $.post(
            "../controlador/laboratorio.listar.controlador.php",{} 
        )
            .done(function(resultado){
                $("#listado").empty();
                $("#listado").append(resultado);
                $('#tabla-listado').dataTable({
                    "aaSorting": [[0, "asc"]]
                });    
            });
}

$(document).ready(function(){   
    listar();
});

$("#frmgrabar").submit(function(event){
   event.preventDefault(); 
   
   if (! confirm("Esta seguro de grabar los datos")){
       return 0;
   }
   
   $.post(
           "../controlador/laboratorio.agregar.editar.controlador.php",
            {
                p_array_datos: $("#frmgrabar").serialize()
            }
        ).done(function(resultado){
            alert(resultado);
           if(resultado==="exito"){
               listar();
               $("#btncerrar").click();
           }
           
        }).fail(function(error){
            alert(error.responseText);
        });
   
});
 
function agregar(){
    $("#myModalLabel").empty().append("Agregar Nuevo Laboratorio");
    $("#txttipooperacion").val("agregar");
    
    $("#txtcodigo").val("");
    $("#txtNombre").val("");        
    $("#txtDireccion").val("");        
    $("#txtTelefono").val("");        
}

function editar(codigoLaboratorio){
    $("#myModalLabel").empty().append("Editar Datos Del Laboratorio");
    $("#txttipooperacion").val("editar");
    
    $.post(
            "../controlador/laboratorio.leer.datos.controlador.php",
            {
                p_codigo : codigoLaboratorio
            }
            ).done(function(resultado){
                //alert(resultado);
                var datos = $.parseJSON(resultado);
                $("#txtcodigo").val(datos.codigoLaboratorio);
                $("#txtNombre").val(datos.nombre);
                $("#txtDireccion").val(datos.direccion);
                $("#txtTelefono").val(datos.telefono);
                
//                alert(datos.nombre);
                
            }).fail(function(error){
                alert(error.responseText);
            });
}


function eliminar(codigoLaboratorio){
    if (! confirm("Esta seguro de eliminar el registro seleccionado")){
        return 0;
    }
    $.post(
            "../controlador/laboratorio.eliminar.controlador.php",
            {
                p_codigoLaboratorio : codigoLaboratorio
            }
        ).done(function(resultado){
            if (resultado==="exito"){
                listar();
            }
        }).fail(function(error){
            alert(error.responseText);
        });
}

$("#myModal").on('shown.bs.modal', function(){
    $("#txtDescripcion").focus();
});