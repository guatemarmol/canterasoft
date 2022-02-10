
<?php include_once '../on-database.php' ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <title>Factura Proveedor | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
                <!---------------------------------------------------CSS----------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------> 
                    <?php include_once '../partials/funciones-css.php' ?>
                <!------------------------------------------------MENU----------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
                    <?php include_once '../partials/menu.html' ?>
    
<body onLoad="usuario();">

    <div class="container-fluid">
                
        <div class="row">
                <!-------------------------------------ESPACIO DEL LADO IZQUIERDO------------------------------------------------>
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="padding-right: 1px; padding-left: 1px;">
                    
                </div>
                <!--------------------------------------------ESPACIO DEL CENTRO---------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-right: 1px; padding-left: 1px;">

                    <form name="form" class="form" id="form" method="POST" action="">    
                        
               <!-------------------------------------------------------HTML------------------------------------------------------------>
               <!-------------------------------------------------------------------------------------------------------------------------->
                        <?php include_once 'factura-proveedor.html' ?>

                    </form>
                
                </div>
                <!---------------------------------------ESPACIO DEL LADO DERECHO------------------------------------------------>
                <!------------------------------------------------------------------------------------------------------------------------->
                <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="padding-right: 1px; padding-left: 1px;">
                    
                </div>
        </div>
               
    </div>
                 <!---------------------------------------------BOTON IR ARRIBA-------------------------------------------------------->
                 <!------------------------------------------------------------------------------------------------------------------------->
    <span class="ir-arriba icon-eject"></span>
                <!--------------------------------------------------JABASCRIPT---------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------->
                    <script type="text/javascript" src="../js/facturacion/factura.js"></script>
                    <?php include_once '../partials/funciones-js.php' ?>
</body>
                <!-------------------------------------------------------PIE-------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------------------------------->
<footer>
                    <?php require_once '../partials/footer.html' ?>
</footer>