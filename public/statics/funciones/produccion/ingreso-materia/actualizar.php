<?php include_once '../../../on-database.php'?>
<?php
	$id_codigo = $_POST['codigo'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];
    $actualizar = mysqli_query($con, $agregar);
    if ($actualizar) {
        echo "<center><strong><h4>¡ Se A con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }