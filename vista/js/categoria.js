
function listar(){       
    $.post(
            "../controlador/categoria.listar.controlador.php",{} 
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
           "../controlador/categoria.agregar.editar.controlador.php",
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
        })
   
});
 
function agregar(){
    $("#myModalLabel").empty().append("Agregar nueva categoria");
    $("#txttipooperacion").val("agregar");
    
    $("#txtcodigo").val("");
    $("#txtDescripcion").val("");        
}

function editar(codigoCargo){
    $("#myModalLabel").empty().append("Editar datos del cargo");
    $("#txttipooperacion").val("editar");
    
    $.post(
            "../controlador/categoria.leer.datos.controlador.php",
            {
                p_codigo : codigoCargo
            }
            ).done(function(resultado){
                //alert(resultado);
                var datos = $.parseJSON(resultado);
                $("#txtcodigo").val(datos.codigoCategoria);
                $("#txtDescripcion").val(datos.descripcion);
                
//                alert(datos.nombre);
                
            }).fail(function(error){
                alert(error.responseText);
            });
}


function eliminar(codigoCategoria){
    if (! confirm("Esta seguro de eliminar el registro seleccionado")){
        return 0;
    }
    $.post(
            "../controlador/categoria.eliminar.controlador.php",
            {
                p_codigoCategoria : codigoCategoria
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