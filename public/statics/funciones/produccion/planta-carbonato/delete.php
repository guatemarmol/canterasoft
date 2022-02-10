<?php 
    include_once '../../../on-database.php';
    $codigo = $_POST['codigo'] ;

    $query = "CALL deleteProduccion($codigo, 2)";
    $result = mysqli_query($con, $query);

    if($result){
        echo "<center><strong><h4>¡La produccion se ha eliminado con éxito!<BR></strong></h4></center>";
    }
    else{
        echo "<center><strong><h4>¡La produccion no puede eliminarse!<BR></strong></h4></center>";
    }
?>