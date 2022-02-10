<?php include_once '../on-database.php'?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Ingreso Materia Prima | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
    <?php include_once '../partials/menu.html'?>
<body onload="relojCalendario()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="padding-right: 1px; padding-left: 1px;">
            </div>			
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-right: 1px; padding-left: 1px;">
                <form name="form" class="form" id="form" method="POST" action="">											<?php 					$data= json_decode($_SESSION['data'], true);					if(isset($data['arrayDatosMateria'][0])){				$sscorrelativo = $data['arrayDatosMateria'][0]['correlativo'];				$ssequipo = $data['arrayDatosMateria'][0]['equipo'];				$ssturno = $data['arrayDatosMateria'][0]['turno'];				$ssmateria = $data['arrayDatosMateria'][0]['materia'];				$ssusuario = $_SESSION['codigo'];				?>				<input id="sesionCorrelativo" type="hidden" value="<?php echo $sscorrelativo?>">				<input id="sesionEquipo" type="hidden" value="<?php echo $ssequipo?>">				<input id="sesionTurno" type="hidden" value="<?php echo $ssturno?>">				<input id="sesionMateria" type="hidden" value="<?php echo $ssmateria?>">				<input id="sesionUsuario" name="ssusuario" type="hidden" value="<?php echo $ssusuario?>">			<?php				}			?>
                    <?php //include_once '../funciones/produccion/ingreso-materia/seleccionar.php'?>
                    <?php include_once 'ingreso-materia-prima.html'?>
                </form>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="padding-right: 1px; padding-left: 1px;">
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/produccion/ingreso-materia-prima.js"></script>
    
</body>
<footer>
    <?php require_once '../partials/footer.html'?>
</footer>