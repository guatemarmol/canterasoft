<?php
include_once '../../../on-database.php';

$envio = $_POST['envio'];
$pedido = $_POST['pedido'];
$fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
$hora = $_POST['hora'];
$cliente = $_POST['cliente'];
$compra = $_POST['compra'];
$trans = $_POST['trans'];
$piloto = $_POST['piloto'];
$placa = $_POST['placa'];
$pFurgon = $_POST['plataFurgon'];
$peso = $_POST['peso'];
$producto = $_POST['producto'];

if (!$con -> query("INSERT INTO envioCliente VALUES (DEFAULT, $envio, '$pedido', '$fecha', '$hora', '$cliente' , '$compra', $trans, '$piloto', '$placa', '$pFurgon', 'Despachado', $peso, '$producto');")) {
    echo "error";
}else{
    echo "ok";
}

$con -> close();
?>