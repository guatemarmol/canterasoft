<?php 

        $codigoCosto = $_REQUEST['codigoCosto'];
        if ($codigoCosto != ""){
                                
            $consulta = "SELECT * FROM costo WHERE codigoCosto='$codigoCosto'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoCosto1 = $fila['codigoCosto'];
            $valorTransporteInternoCosto = $fila['valorTransporteInternoCosto'];
            $energiaElectricaCosto = $fila['energiaElectricaCosto'];
            $manoObraCosto = $fila['manoObraCosto'];
            $comunicacionesCosto = $fila['comunicacionesCosto'];
            $depreciacionesCosto = $fila['depreciacionesCosto'];
            $prestacionesCosto = $fila['prestacionesCosto'];
            $alquileresCosto = $fila['alquileresCosto'];
            $valorTotalCosto = $fila['valorTotalCosto'];
            $fechaCosto = $fila['fechaCosto'];
            $horaCosto = $fila['horaCosto'];
       
        }elseif($codigoCosto == ""){
                                
        }
?>