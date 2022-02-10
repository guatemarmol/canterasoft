 <?php
ob_start();
session_start();

require_once '../on-database.php';
?>

<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Cambio de Contraseña</title>
        <link rel="shortcut icon" type="../image/x-icon" href="../icono.ico"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../assets/css/acceso.css"/>
    </head>

    <body onLoad="fondoMensaje();" class="fondo">
        <div class="container">
            <div class="row">
                <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="form" style="padding: 10px;">
                        <div class="panel-heading">
                            <div class="row">
                                <img alt="" class="img-responsive logo-login" onclick="javascript:location.reload()" src="../images/logo/logo.png"/>
                            </div>
                        </div>
                        <form  action="" method="post" id="form" class="form-login">
                            <div class="row" style="padding-left: 5px; padding-right: 5px; padding: 1px 20px 20px 20px;">
                            <br>
                            <span class="fa fa-user" id="user" style="margin-left: 10px; display: block; margin-bottom: -35px; color: #c4c4c4; font-size: 22px;"></span>
                            <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario" style="text-align: center;" value="<?php echo $_SESSION['usuario']; ?>" readonly>
                            <a class="descripcion" id="descripcion-usuario" style=" margin-top: 4px; margin-bottom: 4px;">Usuario</a>
                            <br>
                            <span class="fa fa-key" id="key" style="margin-left: 10px; display: block; margin-bottom: -35px; color: #c4c4c4; font-size: 22px;"></span>
                            <input name="pass" id="pass" type="password" class="form-control capitalize" placeholder="Nueva Contraseña" style="text-align: center;" onkeyup="saltar(event,'repass')" >
                            <a class="descripcion" id="descripcion-pass" style=" margin-top: 4px; margin-bottom: 4px;">Nueva Contraseña</a>
                            <br>
                            <span class="fa fa-key" id="key" style="margin-left: 10px; display: block; margin-bottom: -35px; color: #c4c4c4; font-size: 22px;"></span>
                            <input name="repass" id="repass" type="password" class="form-control" placeholder="Repetir Contraseña" style="text-align: center;" onkeyup="saltar(event,'cambiar')" >
                            <a class="descripcion" id="descripcion-repass" style=" margin-top: 4px; margin-bottom: 4px;">Repetir Contraseña</a>
                            <a id="error" style="margin-bottom: 10px; margin-top: 10px; color: transparent;">Mensaje</a>
                            <button type="button" id="cambiar" class="button button-block" name="cambiar" onClick="return cambiarPass();">
                            <span class="fa fa-key"></span> Cambiar </button>
                            <div class="form-group">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2 ">
                </div>
            </div>
        </div>
        <div class="error" id="error"></div>
     <?php require 'funciones-js.php'?>
    </body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
        $("#pass").focus();
     });
</script>


