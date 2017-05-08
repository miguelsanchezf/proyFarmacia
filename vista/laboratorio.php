
<?php
    session_name("Sistema-Farmacia");
    session_start();
    
    if( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }        
    $nombreUsuario = ucwords(strtolower($_SESSION["usuario"]));
//    $cargo = ucwords(strtolower($_SESSION["cargo"]));
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    
    <title>Mantenimiento de Laboratorio</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../util/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../util/lte/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../util/lte/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->
    <link href="../util/lte/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet"/>
    
    <!-- Extilos extras-->
    <link href="../util/lte/css/extras.css" rel="stylesheet" type="text/css" />
    
    <!-- Ionicons -->
    <link href="../util/lte/css/ionicons.css" rel="stylesheet" type="text/css" />
   
    <!-- Theme style -->
    <link href="../util/lte/skins/_all-skins.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->    
    <div class="wrapper">
     
      <?php
        include 'cabecera.php';
      ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
            include 'menu.php';
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

    <!-- INICIO: Contenido de la página -->
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mantenimiento de Laboratorio
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Principal</a></li>
            <li><a href="principal.php">Mantenimientos</a></li>
            <li <a href="laboratorio.php" class="active">Laboratorio</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
        <!-- INICIO del formulario modal AGREGAR FASE-->
        <form name="frmgrabar" id="frmgrabar" method="post" action="/">
                <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">o</h4>
                      </div>
                      <div class="modal-body">
                          <p><input type="hidden" name="txttipooperacion" id="txttipooperacion" class="form-control" required=""><p>
                          <div class="row">
                            
                            <div class="col-xs-12">
                                <p>Laboratorio:
                                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre">
                                </p>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-xs-12">
                                <p>Dirección:
                                    <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Direccion">
                                </p>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-xs-8">
                                <p>Teléfono:
                                    <input type="number" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="Telefono">
                                </p>
                            </div>
                          </div>
                          <div class="col-xs-5">
                              <p><input type="hidden" name="txtcodigo" id="txtcodigo" class="form-control" placeholder="Código" readonly=""></p>
                          </div>
                          
                                            
                      </div>
                        
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-danger" aria-hidden="true">Aceptar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal" id="btncerrar">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
        <!-- FIN del formulario modal -->
            
     
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                    <form>
                        <div class="row">                            
                            
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="agregar()">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box-header -->
                
              </div><!-- /.box -->
              
              <div class="box">
                <div class="box-body table-responsive">
                    <div id="listado">
                        
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    <!-- FIN: Contenido de la página -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Sistema Farmacia Maria Jose</a>.</strong> Todos los derechos reservados.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../util/jquery/jquery.min.js"></script>   
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../util/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    
    <!-- DATA TABLE -->
    <script src="../util/lte/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../util/lte/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- SlimScroll -->
    <script src="../util/lte/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../util/lte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../util/lte/js/app.js" type="text/javascript"></script>
    <!-- Temas -->
    <script src="../util/lte/js/demo.js" type="text/javascript"></script>
     
    <script src="js/laboratorio.js"></script>
    
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.js"></script>
    
  </body>
</html>