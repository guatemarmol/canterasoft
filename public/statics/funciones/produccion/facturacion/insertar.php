<?php include_once '../../../on-database.php' ?>

<?php
    
            $numeroFactura = $_POST['numeroFactura'];    
            $consulta = "SELECT * FROM facturacion WHERE numeroFactura='$numeroFactura'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $numeroFactura = $_POST['numeroFactura'];
            $empresa = $_POST['empresa'];
            $division = $_POST['division'];
            $nitCliente = $_POST['nitCliente'];
            $fechaFacturacion = $_POST['fechaFacturacion'];
            $codigoFlete = $_POST['codigoFlete'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
         
         $actualizar ="UPDATE facturacion SET empresa='$empresa', division='$division', nitCliente='$nitCliente', fechaFacturacion='$fechaFacturacion', codigoFlete='$codigoFlete', fecha='$fecha', hora='$hora' WHERE numeroFactura='$numeroFactura'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        /*$consulta = "SELECT MAX(numeroFactura) numeroFactura FROM facturacion";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $numeroFactura = $tabla['numeroFactura'];
        $numeroFactura++; */
         
        $numeroFactura = $_POST['numeroFactura'];
        $empresa = $_POST['empresa'];
        $division = $_POST['division'];
        $nitCliente = $_POST['nitCliente'];
        $fechaFacturacion = $_POST['fechaFacturacion'];
        $codigoFlete = $_POST['codigoFlete'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        $agregar ="INSERT INTO facturacion (numeroFactura, empresa, division, nitCliente, fechaFacturacion, codigoFlete, fecha, hora)
                            VALUES ('$numeroFactura','$empresa','$division','$nitCliente','$fechaFacturacion','$codigoFlete','$fecha','$hora')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>