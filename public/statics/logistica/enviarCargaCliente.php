<?php 
    include_once '../on-database.php'
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Envío a Cliente</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/> 
</head>
    <?php 
        include_once '../partials/funciones-css.php'
    ?>
    <?php 
        include_once '../partials/menu.html'
    ?>
<body onload="relojCalendario()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio"> </div>
            
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">
                <form name="form" class="form" id="form" method="POST" action="">
                    <?php include_once 'enviarCargaCliente.html' ?>
                </form>
            </div>

            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio"> </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../js/logistica/enviarCargaCliente.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" />
    <?php 
        include_once '../partials/funciones-js.php'
    ?>
</body>
<footer>
    <?php 
        require_once '../partials/footer.html'
    ?>
</footer>