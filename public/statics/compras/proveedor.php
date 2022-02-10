<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../on-database.php'?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Proveedor | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
    <!--------------------------CSS------------------------------->
    <!------------------------------------------------------------>
    <?php include_once '../partials/funciones-css.php'?>
    <!--------------------------MENU------------------------------>
    <!------------------------------------------------------------>
    <?php include_once '../partials/menu.html'?>
<body onload="relojCalendario()">
    <div class="container-fluid">
        <div class="row">
            <!-------------------------ORILLA IZQUIERDA------------------------------->
            <!------------------------------------------------------------------------>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">
                <form name="form" class="form" id="form" method="POST" action="" role="form">
                    <?php
                        $codigo = $_REQUEST['codigo'];
                        if ($codigo != "") {
                            $consulta = "SELECT * FROM proveedor WHERE codigo = $codigo";
                            $ejecutar = mysqli_query($con, $consulta);
                            $fila = mysqli_fetch_array($ejecutar);

                            $nombre = $fila['nombre'];
                            $nit = $fila['nit'];
                            $establecimiento = $fila['establecimiento'];
                            $direccion = $fila['direccion'];
                            $regimen = $fila['regimen'];
                            $telefono = $fila['telefono'];
                            $correo = $fila['correo'];
                            $nombreContacto = $fila['nombreContacto'];
                            $telefonoContacto = $fila['telefonoContacto'];
                        }
                        else{
                            $codigo = -1;
                        }
                    ?>
                    <?php include_once 'proveedor.html'?>
                </form>
            </div>
            <!---------------------------ORILLA DERECHA------------------------------->
            <!------------------------------------------------------------------------>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/compras/proveedor.js"></script>
    <!-------------------------JS------------------------------->
    <!---------------------------------------------------------->
    <?php include_once '../partials/funciones-js.php'?>
</body>
<footer>
    <!-------------------------PIE------------------------------->
    <!----------------------------------------------------------->
    <?php require_once '../partials/footer.html'?>
</footer>