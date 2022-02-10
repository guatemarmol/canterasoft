<?php
include_once '../../../on-database.php';

$codCamion = $_POST['camionId'];
$hora = $_POST['hora'];

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if (!$con -> query("INSERT INTO plantaCarbonatoCamion (codigoCamion, fecha, horaLlegada, statusCamion) 
					VALUES ($codCamion, SYSDATE(), '$hora', 'llegada');")) {

	echo "<center><strong><h4>¡Error en el registro de llegada!<BR></strong></h4></center>";

}else{
	echo "<center><strong><h4>¡Llegada Registrada!<BR></h4></center>";
}

$con -> close();
?>