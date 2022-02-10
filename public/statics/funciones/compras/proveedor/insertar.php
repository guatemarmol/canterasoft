<?php
include_once '../../../on-database.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre0'];
$nit = $_POST['nit'];
$establecimiento = $_POST['establecimiento'];
$direccion = $_POST['direccion'];
$regimen = $_POST['regimen'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$nombreContacto = $_POST['nombreContacto'];
$telefonoContacto = $_POST['telefonoContacto'];

if($codigo == -1){
    $query = "INSERT INTO proveedor(nombre, nit, establecimiento, direccion, regimen, telefono, correo, nombreContacto, telefonoContacto) 
        VALUES('$nombre', '$nit', '$establecimiento', '$direccion', '$regimen', $telefono, '$correo', '$nombreContacto', $telefonoContacto)";
    $result = mysqli_query($con, $query);
    echo $result ? 1 : 0;
}
else{
    $query = "UPDATE proveedor SET nombre = '$nombre', nit = '$nit', establecimiento = '$establecimiento', direccion = '$direccion',
                regimen = '$regimen', telefono = $telefono, correo = '$correo', nombreContacto = '$nombreContacto',
                telefonoContacto = $telefonoContacto WHERE codigo = $codigo";
    $result = mysqli_query($con, $query);
    echo $result ? 2 : 0;
}
?>