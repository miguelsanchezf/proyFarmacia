<section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Buscar"/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">Menú Principal</li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i> <span>Mantenimientos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-user-plus"></i>Usuarios</a></li>  
                <li><a href="categoria.php"><i class="fa fa-sitemap"></i>Proveedores</a></li>  
                <li><a href="categoria.php"><i class="fa fa-users"></i>Clientes</a></li>       
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="categoria.php"><i class="fa fa-tag"></i>Categoria</a></li> 
                <li><a href="forma.php"><i class="fa fa-bitbucket"></i>Forma</a></li> 
                <li><a href="laboratorio.php"><i class="fa fa-hospital-o"></i>Laboratorio</a></li>                        
                <li><a href="categoria.php"><i class="fa fa-medkit"></i>Medicamento</a></li>     
            </ul>           

        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Transaccion</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">
                <li><a href="adopcion-listado.php"><i class="glyphicon glyphicon-user"></i>Compra</a></li>
                <li><a href="devoluciones-listado.php"><i class="glyphicon glyphicon-user"></i>Venta</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i> <span>Reportes</span>          
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="grafico-adoptante-edad.php"><i class="glyphicon glyphicon-user"></i>Adoptantes por edad</a></li>
                <li><a href="grafico-refugiado-tamano.php"><i class="fa fa-file-text"></i> Mascotas adoptadas por tamaño</a></li>
                <li><a href="mascotasDisponibles.php"><i class="fa fa-file-text"></i> Mascotas Disponibles</a></li>
                <li><a href="mascotasNoDisponibles.php"><i class="fa fa-file-text"></i> Mascotas con problemas de comportamiento</a></li>
                <li><a href="grafico-refugiado-raza.php"><i class="fa fa-file-text"></i> Mascotas según comportamiento</a></li>
            </ul>
        </li>

    </ul>
</section>