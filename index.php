<?php
    if (isset($_COOKIE["usuario"])){
        $email = $_COOKIE["usuario"];
    }else{
        $email = "";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Inicio al sistema</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="util/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="util/lte/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="util/lte/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="util/lte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .login-page, .register-page { background: #5AC8FA; }
        .login-box-body, .register-box-body {background: #5AC8FA;}
         p, b, strong {color: #fff;}
         .fa-medkit:before {color: #fff;}
      </style>
  </head>
  
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <div class="icon"><i class="fa fa-medkit"></i></div>
        <a><b>Sistema de Farmacia</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
            <b>Ingrese sus datos para iniciar sesión</b>
        </p>
        <form action="controlador/sesion.controlador.php" method="post">
     
          <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Correo Electrónico" autofocus="" name="txtemail" required="" value="<?php echo $email; ?>" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Contraseña" name="txtclave"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">    
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="util/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="util/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="util/lte/plugins/iCheck/icheck.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
