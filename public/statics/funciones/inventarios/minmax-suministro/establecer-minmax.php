<?php
    include_once '../../../on-database.php';
    
    $codigo = $_POST['codigo'];
    $minimo = $_POST['minimo'];
    $maximo = $_POST['maximo'];
    $fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));

    $actualizar = "UPDATE inventario SET valorMinimo = $minimo, valorMaximo = $maximo, fechaUpdate = '$fecha';";
    
    mysqli_query($con, $actualizar);

    if ($actualizar = true) {
        echo "<center><strong><h4> Valores Registrados !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>Error en el Registro !<BR></strong></h4></center>";
    }
    
?>