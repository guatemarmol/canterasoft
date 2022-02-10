<?php
include_once '../../../on-database.php';

$codCamion = $_POST['camionId'];
$hora = $_POST['hora'];


$consulta = "SELECT id FROM plantaCarbonatoCamion WHERE fecha = (SELECT MAX(fecha) 
						FROM plantaCarbonatoCamion WHERE codigoCamion = $codCamion);";
$ejecutar = mysqli_query($con, $consulta);
$idQuery = mysqli_fetch_array($ejecutar);
$idCamion = $idQuery['id'];

$updatePlanta = "UPDATE plantaCarbonatoCamion SET horaVacFinal = '$hora', statusCamion = 'vaciado' WHERE id = $idCamion;";
$updateMaquinaria = "UPDATE maquinaria SET disponible = 0 WHERE id = $codCamion;";
$ejecutarPlanta = mysqli_query($con, $updatePlanta);
$ejecutarMaquinaria = mysqli_query($con, $updateMaquinaria);

if ($ejecutarPlanta AND $ejecutarMaquinaria) {
	echo "<center><strong><h4>¡Vaciado Registrado!<BR></h4></center>";
}else{
	echo "<center><strong><h4>¡Error en el registro de vaciado!<BR></strong></h4></center>";
}

$con -> close();
?>