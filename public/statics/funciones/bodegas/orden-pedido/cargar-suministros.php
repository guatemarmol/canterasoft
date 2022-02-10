<?php
//Vamos a hacer un Get de los codigos de Bodega
$sql       = "SELECT codigosuministro, descripcion FROM suministrobodega;"; //BODEGAS
$resultado = $con->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    //Imprimimos los valores del select
    echo '<option value=' . $fila['codigosuministro'] . ' >' . $fila['descripcion'] . '</option>';
    //Creamos una variable data para crear el String que ira en el array
}

?>