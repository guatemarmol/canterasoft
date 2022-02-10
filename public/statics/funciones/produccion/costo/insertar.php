<?php include_once '../../../on-database.php' ?>

<?php
    
            $codigoCosto = $_POST['codigoCosto'];    
            $consulta = "SELECT * FROM costo WHERE codigoCosto='$codigoCosto'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $codigoCosto = $_POST['codigoCosto'];
            $valorTransporteInternoCosto = $_POST['valorTransporteInternoCosto'];
            $energiaElectricaCosto = $_POST['energiaElectricaCosto'];
            $manoObraCosto = $_POST['manoObraCosto'];
            $comunicacionesCosto = $_POST['comunicacionesCosto'];
            $depreciacionesCosto = $_POST['depreciacionesCosto'];
            $prestacionesCosto = $_POST['prestacionesCosto'];
            $alquileresCosto = $_POST['alquileresCosto'];
            $valorTotalCosto = $_POST['valorTotalCosto'];
            $fechaCosto = $_POST['fechaCosto'];
            $horaCosto = $_POST['horaCosto'];
         
         $actualizar ="UPDATE costo SET valorTransporteInternoCosto='$valorTransporteInternoCosto', energiaElectricaCosto='$energiaElectricaCosto', manoObraCosto='$manoObraCosto', comunicacionesCosto='$comunicacionesCosto', depreciacionesCosto='$depreciacionesCosto', prestacionesCosto='$prestacionesCosto', alquileresCosto='$alquileresCosto', valorTotalCosto='$valorTotalCosto', fechaCosto='$fechaCosto', horaCosto='$horaCosto'  WHERE codigoCosto='$codigoCosto'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoCosto) codigoCosto FROM costo";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoCosto = $tabla['codigoCosto'];
        $codigoCosto++; 
         
        $valorTransporteInternoCosto = $_POST['valorTransporteInternoCosto'];
        $energiaElectricaCosto = $_POST['energiaElectricaCosto'];
        $manoObraCosto = $_POST['manoObraCosto'];
        $comunicacionesCosto = $_POST['comunicacionesCosto'];
        $depreciacionesCosto = $_POST['depreciacionesCosto'];
        $prestacionesCosto = $_POST['prestacionesCosto'];
        $alquileresCosto = $_POST['alquileresCosto'];
        $valorTotalCosto = $_POST['valorTotalCosto'];
        $fechaCosto = $_POST['fechaCosto'];
        $horaCosto = $_POST['horaCosto'];

        $agregar ="INSERT INTO costo (codigoCosto, valorTransporteInternoCosto, energiaElectricaCosto, manoObraCosto, comunicacionesCosto, depreciacionesCosto, prestacionesCosto, alquileresCosto, valorTotalCosto, fechaCosto, horaCosto)
                            VALUES ('$codigoCosto','$valorTransporteInternoCosto','$energiaElectricaCosto','$manoObraCosto','$comunicacionesCosto','$depreciacionesCosto','$prestacionesCosto','$alquileresCosto','$valorTotalCosto','$fechaCosto','$horaCosto')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>