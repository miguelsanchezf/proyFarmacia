<?php

    require_once '../negocio/Categoria.class.php';
    require_once '../util/funciones/Funciones.class.php';
    
    $objCategoria = new Categoria();
    try {
        $registros = 
                $objCategoria->listarCategoria();
    } catch (Exception $exc) {
        Funciones::mensaje($exc->getMessage(), "e");
    }
    
?>

    <table id="tabla-listado" class="table table-bordered table-striped">
        <thead>
                <tr>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>                    
                        <th>&nbsp;</th>

                </tr>
        </thead>
        <tbody>
        <?php
            for ($i=0; $i<count($registros);$i++) { 
                echo '<tr>';
                    echo '<td>'.$registros[$i]["codigoCategoria"].'</td>';
                    echo '<td>'.$registros[$i]["descripcion"].'</td>';                    
                    echo '
                        <td>
                            <a href="javascript:void();" onclick = "editar('.$registros[$i]["codigoCategoria"].')" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit text-green"></i></a>
                            <a href="javascript:void();" onclick = "eliminar('.$registros[$i]["codigoCategoria"].')"><i class="fa fa-trash text-orange"></i></a>
                        </td>
                        ';
                echo '</tr>';
            }
        ?>
        
    </tbody>
    <tfoot>
            <tr>
                     <th>CODIGO</th>
                     <th>DESCRIPCION</th>                    
                     <th>&nbsp;</th>
            </tr>
    </tfoot>
</table>

    
    
    
    