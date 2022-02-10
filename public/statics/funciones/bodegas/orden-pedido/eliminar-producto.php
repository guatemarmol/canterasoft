<?php
include_once '../../../on-database.php';

$actuales = $_POST['actual'];
$eliminacion = $_POST['eliminar'];

$codPedido = $eliminacion[0];

$consulta = "SELECT idPedProd FROM ordenPedidoProducto WHERE codigoPedido =  $codPedido";
$ejecutar = mysqli_query($con, $consulta);

while($ver = mysqli_fetch_array($ejecutar)){
	echo $ver[0];
}

/*for($i = 0; $i < count($actuales); $i++){
	if(in_array($actuales[$i], $eliminacion)){		
		eliminarProducto($actuales[$i], $con, $codPedido);
	}
}*/

function eliminarProducto($indice, $con, $codPedido){
	$consulta2 = "DELETE FROM ordenPedidoProducto WHERE codigoPedido = $codPedido AND idPedProd = $indice;";
   	$ejecutar = mysqli_query($con, $consulta2);
}

$con->close();

?>