<?php 
include_once '../../../on-database.php';

$unidad = $_POST['unidad'];
$producto = $_POST['producto'];
$peso = $_POST['peso'];
$hora = $_POST['hora'];
$fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));

$codigo = $unidad.$producto.$peso;

$query = "INSERT INTO inventarioCarbonato VALUES (DEFAULT, '$codigo', '$producto', $peso, 'Llenado Planta' ,'$fecha', '$hora', 'TURNO');";

if (!$con -> query($query)) {
        echo "<center><strong><h4>¡Error en el registro!<BR></strong></h4></center>";
}else{
        echo "ok";
}

$con -> close();
?>