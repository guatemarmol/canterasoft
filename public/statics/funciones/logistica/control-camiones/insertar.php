<?php include_once '../../../on-database.php'
?>
<?php
$tipoCarga = $_POST['tipoCarga'];
$placa = $_POST['camion'];
$estadoCamion = $_POST['estadoPipa'];
$observaciones = $_POST['observaciones'];
$enTransito = $_POST['enTransito'] == "on" ? 1 : 0;
$ubicacion = $_POST['ubicacion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$horario = $_POST['horario'];
$codigo = $_POST['codigo'];
$to_date = "STR_TO_DATE('$fecha $hora','%d/%m/%Y %H:%i:%s')";

if($codigo == 0){
    
    $query = "INSERT INTO controlCamion(tipoCarga, estado, ubicacion, fecha, observaciones, enTransito, camion, hora)
              VALUES ('$tipoCarga', '$estadoCamion', $ubicacion, $to_date, '$observaciones', $enTransito, '$placa', '$horario')";
    
    mysqli_query($con, $query);
    
    if ($query) {
        echo "<center><strong><h4>¡ Se Agregó con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}
else{
    $query = "UPDATE controlCamion SET tipoCarga = '$tipoCarga', estado = '$estadoCamion',
                ubicacion = $ubicacion, fecha = $to_date, observaciones = '$observaciones',
                enTransito = $enTransito, camion = '$placa', hora = '$horario' WHERE codigo = $codigo";

    $result = mysqli_query($con, $query);
    
    if ($result) {
        echo "<center><strong><h4>¡ Se Modificó con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la modificación, Verificalo!<BR></strong></h4></center>";
    }
}
