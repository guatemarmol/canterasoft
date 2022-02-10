<?php
include_once '../../../on-database.php';

$proveedor = $_POST['proveedor'];
$categoria = $_POST['categoria'];
$claseProveedor = $_POST['claseProveedor'];
$query = "INSERT INTO proveedorCategoria(proveedor, categoria, rango) VALUES($proveedor, $categoria, '$claseProveedor')";
$result = mysqli_query($con, $query);
echo $result ? 1 : 0;

?>