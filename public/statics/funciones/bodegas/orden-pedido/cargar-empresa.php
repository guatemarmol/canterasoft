<?php
//Vamos a hacer un Get de los codigos de Empresa
$sql       = "SELECT * FROM  empresa;";
$resultado = $con->query($sql);
$arrayempresa     = [];
$i         = 0;
while ($fila = $resultado->fetch_assoc()) {
    //Imprimimos los valores del select
    echo '<option value=' . $fila['codigoEmpresa'] . ' >' . $fila['razonSocialEmpresa'] . '</option>';
    //Creamos una variable data para crear el String que ira en el array
    $data = $fila['codigoEmpresa']."||".$fila['razonSocialEmpresa'];
    //La variable i se desplaza en el array; Colocamos en la posicion i el valor del String
    $arrayempresa[$i] = $data;
    $i++;
}
//Reiniciamos Contador
$i = 0;

?>

<!--ESTE SCRIPT ES UNICO PARA EL SELECT, POR ESO MISMO ES QUE NO DEBE DE MOVERSE DE AQUI Y LLEVARLO A ODEN-PEDIDO.JS -->
<script type="text/javascript">
// Con esta funcion, usaremos Jquery para seleccionar el codigo del Select, y proceder a poner los datos Nombre y Apellido en el Input tipo Texto.
function VerificarEmpresa(valor) { //AQUI RECIBE EL THIS.VALUE (OPTION SELECTED) DEL SELECT
    //Pasamos nuestro array data del php a una variable Javascript/Jquery
    var datos = <?php echo json_encode($arrayempresa); ?>;
    Swal.fire({
        icon: 'info',
        title: valor,
        text: 'EMPRESA',
        footer: 'ORDEN DE PEDIDO | Guatemarmol S.A'
    });
}

</script>