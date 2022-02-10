<?php include_once '../on-database.php';?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Sub División | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
    <?php include_once '../partials/funciones-css.php';?>
    <?php include_once '../partials/menu.html';?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">
                <form name="form" class="form" id="form" method="POST" action="">
                    <?php include_once '../funciones/rrhh/subDivision/seleccionar.php';?>
                    <?php include_once 'sub-division.html';?>
                </form>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/rrhh/subDivision.js"></script>
    <?php include_once '../partials/funciones-js.php';?>
</body>
<footer>
    <?php require_once '../partials/footer.html';?>
</footer>