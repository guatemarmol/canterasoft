<?php
include_once '../../../on-database.php';

$envio = $_POST['envio'];
$fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
$hora = $_POST['hora'];
$trans = $_POST['trans'];
$piloto = $_POST['piloto'];
$placa = $_POST['placa'];
$peso = $_POST['peso'];
$producto = $_POST['producto'];

if (!$con -> query("INSERT INTO envioPredio VALUES (DEFAULT, $envio,'$producto', '$fecha', '$hora', $trans , '$piloto', '$placa', 'Ojo de Agua', 'Camino a Predio',$peso);")) {
    echo "error";
}else{
    echo "ok";
}

$con -> close();
?>