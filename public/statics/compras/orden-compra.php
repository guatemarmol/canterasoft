<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../on-database.php'?>
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Orden Compra | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>-->
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
                <form name="form" class="form" id="form" method="POST" action="">
                    <!-------------------------HTML------------------------------->
                    <!------------------------------------------------------------>
                    <?php include_once 'orden-compra.html'?>
                </form>
            </div>
            <!---------------------------ORILLA DERECHA------------------------------->
            <!------------------------------------------------------------------------>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="../js/picker-Calendar/dist/daterangepicker.min.css">
    <script type="text/javascript" src="../js/picker-Calendar/moment.min.js"></script>
    <script type="text/javascript" src="../js/picker-Calendar/dist/jquery.daterangepicker.min.js"></script>
    <!--    <script type="text/javascript" src="../js/picker-Calendar/dist/jquery.min.js"></script> -->
    
    <script type="text/javascript" src="../js/compras/ordenCompra.js"></script>

    <!-------------------------JS------------------------------->
    <!---------------------------------------------------------->
    <?php include_once '../partials/funciones-js.php'?>
</body>
<footer>
    <!-------------------------PIE------------------------------->
    <!----------------------------------------------------------->
    <?php require_once '../partials/footer.html'?>
</footer>