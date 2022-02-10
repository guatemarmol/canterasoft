<?php 

        $codigo = $_REQUEST['codigo'];
        if ($codigo != ""){
                                
            $consulta = "SELECT * FROM   proveedorCompras WHERE codigo='$codigo'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigo1 = $fila['codigo'];
            $razonSocial = $fila['razonSocial'];
            $direccionFiscal = $fila['direccionFiscal'];
            $telefono1 = $fila['telefono1'];
            $contacto1 = $fila['contacto1'];
            $correo1 = $fila['correo1'];
            $telefono2 = $fila['telefono2'];
            $contacto2 = $fila['contacto2'];
            $correo2 = $fila['correo2'];
            $canje = $fila['canje'];
            $diasCredito = $fila['diasCredito'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($codigo == ""){
                                
        }
?>