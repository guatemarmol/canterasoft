<?php include_once '../../../on-database.php'?>
<?php
	$id_codigo = $_POST['codigo'];
    $fecha        = $_POST['fecha'];	$date = DateTime::createFromFormat('d/m/Y', $fecha);	$fechaFormat = date_format($date, 'Y-m-d');
    $hora         = $_POST['hora'];	$etapa = $_POST['etapa'];	$agregar   = "UPDATE ingresoMateriaPrima SET etapa='$etapa', fecha_salida = '$fechaFormat', hora_salida= '$hora' WHERE id_ingreso ='$id_codigo'";
    $actualizar = mysqli_query($con, $agregar);
    if ($actualizar) {
        echo "<center><strong><h4>¡ Se A con Éxito !<BR></h4></center>";		        mysqli_query($con, $actualizar);
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
