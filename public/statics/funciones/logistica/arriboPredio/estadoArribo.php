<?php
include_once '../../../on-database.php';

$codigo = $_POST['id'];

$exito = false;

if (!$con -> query("UPDATE envioPredio SET estado = 'Arribo en Predio' WHERE codigo = $codigo;")) {
    echo "error";
}else{
    $jumbosPedido = "SELECT jumbo FROM envioPredioProducto WHERE codigoEnvio = $codigo;";
    $resultado = $con->query($jumbosPedido);
    
    while($fila = mysqli_fetch_assoc($resultado)){
        $jumbo = $fila['jumbo'];
        if(!$con -> query("UPDATE inventarioCarbonato SET estado = 'Lleno Predio' WHERE codigo = '$jumbo';")){
            $exito = false;
            break;
        }else{
            $exito = true;
        }
    }

    if($exito){
        echo "ok";
    }else{
        echo "error";
    }
}

$con -> close();
?>