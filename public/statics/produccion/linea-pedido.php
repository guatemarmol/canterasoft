
<?php include_once '../on-database.php' ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <title>Línea de Pedido | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
                <!---------------------------------------------------CSS----------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------> 
                    <?php include_once '../partials/funciones-css.php' ?>
                <!------------------------------------------------MENU----------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
                    <?php include_once '../partials/menu.html' ?>
    
<body>

    <div class="container-fluid">
                
        <div class="row">
                <!-------------------------------------ESPACIO DEL LADO IZQUIERDO------------------------------------------------>
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
                    
                </div>
                <!--------------------------------------------ESPACIO DEL CENTRO---------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">

                    <form name="form" class="form" id="form" method="POST" action="">    
                        
                        <?php include_once '../funciones/produccion/linea-pedido/seleccionar.php' ?>
                        
               <!-------------------------------------------------------HTML------------------------------------------------------------>
               <!-------------------------------------------------------------------------------------------------------------------------->
                        <?php include_once 'linea-pedido.html' ?>

                    </form>
                
                </div>
                <!---------------------------------------ESPACIO DEL LADO DERECHO------------------------------------------------>
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
                    
                </div>
        </div>
               
    </div>
                 <!---------------------------------------------BOTON IR ARRIBA-------------------------------------------------------->
                 <!------------------------------------------------------------------------------------------------------------------------->
    <span class="ir-arriba icon-eject"></span>
                <!--------------------------------------------------JABASCRIPT---------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------->
                    <script type="text/javascript" src="../js/produccion/linea-pedido.js"></script>
                    <?php include_once '../partials/funciones-js.php' ?>
</body>
                <!-------------------------------------------------------PIE-------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
<footer>
                    <?php require_once '../partials/footer.html' ?>
</footer>