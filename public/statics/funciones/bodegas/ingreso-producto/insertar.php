<?php
    include_once '../../../on-database.php';

    $codigo = $_POST['codigo'] ;
    $descripcion = $_POST['descripcion']; 
    $color = $_POST['color'];
    $categoria = $_POST['categoria'];
    $unidadDeMedida = $_POST['medida'];
    $equivalente1 = $_POST['equivalente1'];
    $equivalente2 = $_POST['equivalente2'];

    $query = "CALL controlProducto($codigo, '$descripcion', '$color', $categoria, $unidadDeMedida, '$equivalente1', '$equivalente2')";
    $result = mysqli_query($con, $query);
    if($result){
        if($codigo == -1){
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
