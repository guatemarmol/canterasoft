<?php include_once '../../../on-database.php'?>
<?php
$correlativo = $_POST['correlativo'];
$consulta    = "SELECT * FROM ingresoMateriaPrima WHERE correlativo='test'";
$ejecutar    = mysqli_query($con, $consulta);
$fila        = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $correlativo  = $_POST['correlativo'];
    $materiaPrima = $_POST['material'];
    $placa        = $_POST['placa'];
    $peso         = $_POST['peso'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];
    $actualizar   = "UPDATE ingresoMateriaPrima SET materiaPrima='$materiaPrima', placa='$placa', peso='$peso', fecha='$fecha', hora='$hora' WHERE correlativo='$correlativo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta    = "SELECT MAX(correlativo) correlativo FROM ingresoMateriaPrima;";
    $ejecutar    = mysqli_query($con, $consulta);
    $tabla       = mysqli_fetch_array($ejecutar);
    $correlativo = $tabla['correlativo'];
   // $correlativo++;
    if ($correlativo == 1) {
        $correlativo = $correlativo;
    } else if ($correlativo != 1) {
        $correlativo = $correlativo;
    }
    $materiaPrima = $_POST['material'];
    $placa        = $_POST['camion'];		$piloto 	 = $_POST['piloto'];		$equipo 	 = $_POST['equipo'];		$turno 	 = $_POST['turno'];
    $peso         = $_POST['peso'];
    $fecha        = $_POST['fecha'];	$date = DateTime::createFromFormat('d/m/Y', $fecha);	$fechaFormat = date_format($date, 'Y-m-d');
    $hora         = $_POST['hora'];		$etapa = "Ingresado";		$usuario = $_POST['ssusuario'];		$arrayJson = '{"arrayDatosMateria": [{"turno": "'.$turno.'", "equipo": "'.$equipo.'", "materia": "'.$materiaPrima.'", "correlativo": "'.$correlativo.'"}]}';
    $agregar      = "INSERT INTO ingresoMateriaPrima (id_ingreso, correlativo, numero_placa, materia_prima, etapa, piloto, equipo, turno, fecha, hora, peso, fecha_salida, hora_salida)
                            VALUES ('', '$correlativo','$placa', '$materiaPrima', '$etapa', '$piloto', '$equipo','$turno', '$fechaFormat', '$hora','$peso', '', '')";														
    mysqli_query($con, $agregar);
    if ($agregar) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";		    $actualizar   = "UPDATE usuario SET accesos='$arrayJson' WHERE codigo='$usuario'";    mysqli_query($con, $actualizar);
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}
