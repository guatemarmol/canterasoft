<?php
include_once '../../../on-database.php';

//$existe = $_POST['existe'];
//$idPedProducto = $_POST['idPedProd'];
$codPedido = $_POST['pedido'];
$codProducto = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$descripcion = $_POST['descripcion'];
$maquina = $_POST['maquina'];
$consumo = $_POST['consumo'];
$saldo = $_POST['saldo'];
$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];
$horometro =$_POST['horometro'];
$nota = $_POST['nota'];
$autorizacion = $_POST['autorizacion'];
$estado = $_POST['estado'];

/*if ($existe == 1) {
    if (!$con -> query("UPDATE  ordenPedidoProducto 
                        SET  cantidad = $cantidad, unidadMedida = '$unidad', descripcion = '$descripcion', 
                            maquina = '$maquina', consumo = $consumo, saldo = $saldo, nota = '$nota', horometro = $horometro
                        WHERE codigoPedido = '$codPedido' AND idPedProd = $idPedProducto;")) {

        //echo "<center><strong><h4>¡Error en la Actualización<BR></strong></h4></center>";
        echo 0;
    }else{
        //echo "<center><strong><h4>¡ Pedido Actualizado Exitosamente !<BR></h4></center>";
        echo $idPedProducto;
    }

}else{*/
    if (!$con -> query("INSERT INTO ordenPedidoProducto
                            VALUES (DEFAULT, '$codPedido', '$codProducto' , $cantidad, '$unidad','$descripcion' ,
                                    '$maquina',$consumo, $saldo, $minimo, $maximo , $horometro,'$nota','$autorizacion', '$estado');")) {
        echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
    }else{
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    }
//}
?>