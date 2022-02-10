<?php
include_once '../../../on-database.php';

$codCamion = $_POST['camion'];

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$consulta = "SELECT statusCamion FROM plantaCarbonatoCamion WHERE fecha = (SELECT MAX(fecha) 
						FROM plantaCarbonatoCamion WHERE codigoCamion = $codCamion);";
$ejecutar = mysqli_query($con, $consulta);

$statusQuery = mysqli_fetch_array($ejecutar);
$status = $statusQuery['statusCamion'];

echo $status;

$con -> close();
?>
