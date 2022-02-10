<?php
//Vamos a hacer un Get de los codigos de Bodega
$sql       = "SELECT * FROM  unidadMedidaInventarios;"; //BODEGAS
$resultado = $con->query($sql);
$arrayunidad     = [];
$i         = 0;
while ($fila = $resultado->fetch_assoc()) {
    //Imprimimos los valores del select
    echo '<option value=' . $fila['codigo'] . ' >' . $fila['nombre'] . '</option>';
    //Creamos una variable data para crear el String que ira en el array
    $data = $fila['codigo']."||".$fila['nombre'];
    //La variable i se desplaza en el array; Colocamos en la posicion i el valor del String
    $arrayunidad[$i] = $data;
    $i++;
}

//Reiniciamos Contador
$i = 0;

?>

<!--ESTE SCRIPT ES UNICO PARA EL SELECT, POR ESO MISMO ES QUE NO DEBE DE MOVERSE DE AQUI Y LLEVARLO A ODEN-PEDIDO.JS -->
<script type="text/javascript">
// Con esta funcion, usaremos Jquery para seleccionar el codigo del Select, y proceder a poner los datos Nombre y Apellido en el Input tipo Texto.
function VerificarUnidad(valor) { //AQUI RECIBE EL THIS.VALUE (OPTION SELECTED) DEL SELECT
    //Pasamos nuestro array data del php a una variable Javascript/Jquery
   /* var datos = <?php echo json_encode($arrayunidad); ?>;
    Swal.fire({
        icon: 'info',
        title: valor,
        text: 'UNIDAD',
        footer: 'ORDEN DE PEDIDO | Guatemarmol S.A'
    }); */
}

</script>