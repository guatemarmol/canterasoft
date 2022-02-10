<?php
function insertar_datos($codigo, $nombreAcreedor, $descripcion, $tipo, $fContabilizacion, $fVencimiento, $nReferencia, $saldoVencido, $uno, $dos, $tres, $cuatro, $cinco)
{
    global $conexion;
    $sentencia = "INSERT INTO cuentasXpagarSAP (codigo, nombreAcreedor, descripcion, tipo, fContabilizacion, fVencimiento, nReferencia, saldoVencido, uno, dos, tres, cuatro, cinco) VALUE('$codigo', '$nombreAcreedor', '$descripcion', '$tipo', '$fContabilizacion', '$fVencimiento', '$nReferencia', '$saldoVencido', '$uno', '$dos', '$tres', '$cuatro', '$cinco')";
    $ejecutar  = mysqli_query($conexion, $sentencia);
    return $ejecutar;
}
