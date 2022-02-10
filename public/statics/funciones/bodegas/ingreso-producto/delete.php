<?php 
    include_once '../../../on-database.php';
    $codigo = $_POST['codigo'] ;

    $query = "DELETE FROM producto WHERE codigo = $codigo";
    $result = mysqli_query($con, $query);

    if($result){
        echo "<center><strong><h4>¡El producto se ha eliminado con éxito!<BR></strong></h4></center>";
    }
    else{
        echo "<center><strong><h4>¡El producto no puede eliminarse!<BR></strong></h4></center>";
    }
?>