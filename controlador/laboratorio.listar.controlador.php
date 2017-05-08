<?php

    require_once '../negocio/Laboratorio.class.php';
    require_once '../util/funciones/Funciones.class.php';
    
    $objLaboratorio = new Laboratorio();
    try {
        $registros = 
                $objLaboratorio->listarLaboratorio();
    } catch (Exception $exc) {
        Funciones::mensaje($exc->getMessage(), "e");
    }
    
?>

    <table id="tabla-listado" class="table table-bordered table-striped">
        <thead>
                <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>                    
                        <th>DIRECCION</th>                    
                        <th>TELEFONO</th>                    
                        <th>&nbsp;</th>

                </tr>
        </thead>
        <tbody>
        <?php
            for ($i=0; $i<count($registros);$i++) { 
                echo '<tr>';
                    echo '<td>'.$registros[$i]["codigoLaboratorio"].'</td>';
                    echo '<td>'.$registros[$i]["nombre"].'</td>';                    
                    echo '<td>'.$registros[$i]["direccion"].'</td>';                    
                    echo '<td>'.$registros[$i]["telefono"].'</td>';                    
                    echo '
                        <td>
                            <button class="btn btn-warning" href="javascript:void();" onclick = "editar('.$registros[$i]["codigoLaboratorio"].')" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger" href="javascript:void();" onclick = "eliminar('.$registros[$i]["codigoLaboratorio"].')"><i class="fa fa-trash"></i></button>
                        </td>
                        ';
                echo '</tr>';
            }
        ?>
        
    </tbody>
    <tfoot>
            <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>                    
                        <th>DIRECCION</th>                    
                        <th>TELEFONO</th>                    
                        <th>&nbsp;</th>
            </tr>
    </tfoot>
</table>

    
    
    
    