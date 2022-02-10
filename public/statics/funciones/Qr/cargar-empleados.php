<?
//Vamos a hacer un Get de los codigos de Empleado
$sql       = "SELECT codigoEmpleado,nombreEmpleado,apellidoEmpleado,nombrePuesto,estado FROM  empleado WHERE estado='Activo';";
$resultado = $con->query($sql);
$array     = [];
$i         = 0;
while ($fila = $resultado->fetch_assoc()) {
    //Imprimimos los valores del select
    echo '<option value=' . $fila['codigoEmpleado'] . ' >' . $fila['codigoEmpleado'] . '</option>';
    //Creamos una variable data para crear el String que ira en el array
    $data = $fila['codigoEmpleado'] . "||" . $fila['nombreEmpleado'] . "||" . $fila['apellidoEmpleado'] . "||" . $fila['nombrePuesto'];
    //La variable i se desplaza en el array; Colocamos en la posicion i el valor del String
    $array[$i] = $data;
    $i++;
}
//Reiniciamos Contador
$i = 0;

?>
                <!-------------------------CODIGO JQUERY/JAVASCRIPT---------------------------------->
                <!----------------------------------------------------------------------------------->
<script>

  // Con esta funcion, usaremos Jquery para seleccionar el codigo del Select,
  // y proceder a poner los datos Nombre y Apellido en el Input tipo Texto.
  function VerificarCodigo() {
  //Pasamos nuestro array data del php a una variable Javascript/Jquery
      var datos = <?php echo json_encode($array); ?>;

  //Obtener Texto del Select
  let x = $( "#empleados option:selected" ).text();

  //Recorrer la matriz y buscar el codigo para poner el nombre y el apellido en el input #nombreB
   for (var i=0; i<datos.length; i++) {
  //console.log(datos[i]);
  //Se busca la posicion inicial de la palabra dentro de la cadena
      var posicion = datos[i].indexOf(x);
      if (posicion !== -1){

  // se hace un split de la cadena, como se guardaron desde el php, se dividio mediante los simbolos ||
        let d = datos[i].split('||');
  //los arrays 1 y 2 se utilizan como nombre y apellido respectivamente, y se imprime con jquery al boton.
        var Nombre = d[1] + " " + d[2];
        $('#nombreB').val(Nombre);
         $('#NombreEmpleadoQr').text(Nombre);
         $('#CodigoEmpleadoQr').text(d[3]);
        makeCode();
     }
    }
  }

</script>