<?php include_once '../../../on-database.php'?>
<?php
$placa    = $_POST['placa'];
$consulta = "SELECT * FROM camionTractor WHERE placa='$placa'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $placa          = $_POST['placa'];
    $transportista  = $_POST['transportista'];
    $capacidad      = $_POST['capacidad'];
    $marca          = $_POST['marca'];
    $modelo         = $_POST['modelo'];
    $tipoTransporte = $_POST['tipoTransporte'];
    $fecha          = $_POST['fecha'];
    $hora           = $_POST['hora'];
    $actualizar     = "UPDATE camionTractor SET transportista='$transportista', capacidad='$capacidad', marca='$marca', modelo='$modelo', tipoTransporte='$tipoTransporte', fecha='$fecha', hora='$hora' WHERE placa='$placa'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $placa          = $_POST['placa'];
    $transportista  = $_POST['transportista'];
    $capacidad      = $_POST['capacidad'];
    $marca          = $_POST['marca'];
    $modelo         = $_POST['modelo'];
    $tipoTransporte = $_POST['tipoTransporte'];
    $fecha          = $_POST['fecha'];
    $hora           = $_POST['hora'];
    $agregar        = "INSERT INTO camionTractor (placa, transportista, capacidad, marca, modelo, tipoTransporte, fecha, hora)
                            VALUES ('$placa','$transportista','$capacidad','$marca','$modelo','$tipoTransporte','$fecha','$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}
