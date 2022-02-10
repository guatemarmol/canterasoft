<?php
    include_once '../../on-database.php';

    $codigo_ = $_POST['codigo_'] ;
    $codigo_2 = $_POST['codigo_2']; 
    $actividad = $_POST['actividad'];
    $duracion = $_POST['duracion'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    $query = "CALL insertActividad($codigo_,$codigo_2,'$actividad',$duracion,'$fechaInicio','$fechaFin');";
    $result = mysqli_query($con, $query);
    if($result){
        if($codigo_ == -1){
            echo "<center><strong><h4>¡La actividad se ha ingresado con éxito!<BR></strong></h4></center>";
        }
        else{
            echo "<center><strong><h4>¡La actividad se ha actualizado con éxito!<BR></strong></h4></center>";
        }
    }
    else{
        echo "<center><strong><h4>¡Error en el servidor, contacte al administrador!<BR></strong></h4></center>";
    }
?>