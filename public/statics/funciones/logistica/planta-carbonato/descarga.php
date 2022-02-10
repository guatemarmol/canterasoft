<?php
include_once '../../../on-database.php';

$codCamion = $_POST['camionId'];
$hora = $_POST['hora'];


$consulta = "SELECT id FROM plantaCarbonatoCamion WHERE fecha = (SELECT MAX(fecha) 
						FROM plantaCarbonatoCamion WHERE codigoCamion = $codCamion);";
$ejecutar = mysqli_query($con, $consulta);
$idQuery = mysqli_fetch_array($ejecutar);
$idCamion = $idQuery['id'];

if (!$con -> query("UPDATE plantaCarbonatoCamion 
					SET horaDescarga = '$hora', horaVacInicio = '$hora', statusCamion = 'descarga'
					WHERE id = $idCamion;")) {
	echo "<center><strong><h4>¡Error en el registro de descarga!<BR></strong></h4></center>";
}else{
	echo "<center><strong><h4>¡Descarga Registrada!<BR></h4></center>";
}

$con -> close();
?>