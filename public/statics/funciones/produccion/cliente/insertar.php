<?php include_once '../../../on-database.php' ?>

<?php
    
            $codigoCliente = $_POST['codigoCliente'];    
            $consulta = "SELECT * FROM cliente WHERE codigoCliente='$codigoCliente'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $codigoCliente = $_POST['codigoCliente'];
            $nitCliente = $_POST['nitCliente'];
            $nombreComercialCliente = $_POST['nombreComercialCliente'];
            $nombreContactoCliente = $_POST['nombreContactoCliente'];
            $pbxCliente = $_POST['pbxCliente'];
            $telefonoCliente = $_POST['telefonoCliente'];
            $correoCliente = $_POST['correoCliente'];
            $direccionFiscalCliente = $_POST['direccionFiscalCliente'];
            $direccionEntrega1Cliente = $_POST['direccionEntrega1Cliente'];
            $direccionEntrega2Cliente = $_POST['direccionEntrega2Cliente'];
            $direccionEntrega3Cliente = $_POST['direccionEntrega3Cliente'];
            $fechaCliente = $_POST['fechaCliente'];
            $horaCliente = $_POST['horaCliente'];
         
         $actualizar ="UPDATE cliente SET nitCliente='$nitCliente', nombreComercialCliente='$nombreComercialCliente', nombreContactoCliente='$nombreContactoCliente', pbxCliente='$pbxCliente', telefonoCliente='$telefonoCliente', correoCliente='$correoCliente', direccionFiscalCliente='$direccionFiscalCliente', direccionEntrega1Cliente='$direccionEntrega1Cliente', direccionEntrega2Cliente='$direccionEntrega2Cliente', direccionEntrega3Cliente='$direccionEntrega3Cliente', fechaCliente='$fechaCliente', horaCliente='$horaCliente' WHERE codigoCliente='$codigoCliente'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoCliente) codigoCliente FROM cliente";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoCliente = $tabla['codigoCliente'];
        $codigoCliente++; 
        
        $nitCliente = $_POST['nitCliente'];
        $nombreComercialCliente = $_POST['nombreComercialCliente'];
        $nombreContactoCliente = $_POST['nombreContactoCliente'];
        $pbxCliente = $_POST['pbxCliente'];
        $telefonoCliente = $_POST['telefonoCliente'];
        $correoCliente = $_POST['correoCliente'];
        $direccionFiscalCliente = $_POST['direccionFiscalCliente'];
        $direccionEntrega1Cliente = $_POST['direccionEntrega1Cliente'];
        $direccionEntrega2Cliente = $_POST['direccionEntrega2Cliente'];
        $direccionEntrega3Cliente = $_POST['direccionEntrega3Cliente'];
        $fechaCliente = $_POST['fechaCliente'];
        $horaCliente = $_POST['horaCliente'];

        $agregar ="INSERT INTO cliente (codigoCliente, nitCliente, nombreComercialCliente, nombreContactoCliente, pbxCliente, telefonoCliente, correoCliente, direccionFiscalCliente,direccionEntrega1Cliente,direccionEntrega2Cliente,direccionEntrega3Cliente,fechaCliente,horaCliente)
                            VALUES ('$codigoCliente', '$nitCliente', '$nombreComercialCliente', '$nombreContactoCliente', '$pbxCliente', '$telefonoCliente', '$correoCliente', '$direccionFiscalCliente','$direccionEntrega1Cliente','$direccionEntrega2Cliente','$direccionEntrega3Cliente','$fechaCliente','$horaCliente')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>