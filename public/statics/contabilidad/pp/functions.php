<?php
function insertar_datos($codigo, $nombreAcreedor, $tipo, $saldoVencido, $aFuturo, $uno, $dos, $tres, $cuatro)
{
    global $conexion;
    $sentencia = "INSERT INTO cuentasXpagarPP (codigo, nombreAcreedor, tipo, saldoVencido, aFuturo, uno, dos, tres, cuatro) VALUE('$codigo', '$nombreAcreedor', '$tipo', '$saldoVencido', '$aFuturo', '$uno', '$dos', '$tres', '$cuatro')";
    $ejecutar  = mysqli_query($conexion, $sentencia);
    return $ejecutar;
}
