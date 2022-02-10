<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../on-database.php'?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Número Cuenta | CanteraSoft</title>
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
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
                <!-------------------------ORILLA IZQUIERDA------------------------------->
                <!------------------------------------------------------------------------>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">
                <form name="form" class="form" id="form" method="POST" action="">
                    <!-------------------------HTML------------------------------->
                    <!------------------------------------------------------------->
                    <?php include_once 'numero-cuenta.html'?>
                </form>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
                <!--------------------------ORILLA DERECHA-------------------------------->
                <!------------------------------------------------------------------------>
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/contabilidad/numeroCuenta.js"></script>
    <!-------------------------JS------------------------------->
    <!---------------------------------------------------------->
    <?php include_once '../partials/funciones-js.php'?>
</body>
<footer>
    <!-------------------------PIE------------------------------>
    <!---------------------------------------------------------->
    <?php require_once '../partials/footer.html'?>
</footer>