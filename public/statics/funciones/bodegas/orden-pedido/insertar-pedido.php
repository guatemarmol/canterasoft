<?php
include_once '../../../on-database.php';
$codigo   = $_POST['numero'];
$consulta = "SELECT * FROM ordenPedido WHERE codigo ='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

$usuario      = $_POST['usuario'];
$bodega       = $_POST['bodega'];
$status       = $_POST['status'];
$solicitante  = $_POST['solicitante'];
$fecha        = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
$autorizacion = $_POST['autorizacion'];
$referencia   = $_POST['referencia'];   
$nota         = $_POST['comentariopedido'];

if (isset($fila[0]) && $fila[0] > 0) {
    $actualizar = "UPDATE  ordenPedido SET usuario='$usuario', bodega='$bodega', solicitante='$solicitante', 
                            referencia='$referencia', fecha='$fecha', nota='$nota' 
                        WHERE codigo = $codigo;";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    $agregar = "INSERT INTO `ordenPedido` VALUES (DEFAULT, '$codigo', '$fecha', '$usuario', '$bodega', '$status', 
                                                    '$solicitante', '$referencia', '$autorizacion', '$nota') ;";

    mysqli_query($con, $agregar);

    if ($agregar = true) {
        echo "<center><strong><h4>¡Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>Datos Faltantes!<BR></strong></h4></center>";
    }
}

?>