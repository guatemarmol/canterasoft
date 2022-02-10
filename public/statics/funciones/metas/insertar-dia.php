<?php
    include_once '../../on-database.php';

    $codigo_ = $_POST['codigo_'] ;
    $actividad = $_POST['actividad']; 
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $duracion = $_POST['duracion'];
    $fechaDia = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fechaDia'])));
    $sabados = $_POST['sabados'];
    $colorevento = $_POST['colorevento'];

    $query = "CALL insertActividadDia($codigo_,'$actividad','$fechaInicio','$fechaFin',$duracion,'$fechaDia',$sabados,'$colorevento');";


    
    
    $result = mysqli_query($con, $query);
    if($result){
        if($codigo_ == -1){
            echo "<center><strong><h4>¡El producto se ha ingresado con éxito!<BR></strong></h4></center>";
        }
        else{
            echo "<center><strong><h4>¡El producto se ha actualizado con éxito!<BR></strong></h4></center>";
        }
    }
    else{
        echo "<center><strong><h4>¡Error en el servidor, contacte al administrador!<BR></strong></h4></center>";
    }
?>
