<?php 

        $codigoEmpleado = $_REQUEST['codigoEmpleado'];
        if ($codigoEmpleado != ""){
                                
            $consulta = "SELECT * FROM empleado WHERE codigoEmpleado='$codigoEmpleado'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);
            $codigoEmpleado1 = $fila['codigoEmpleado'];
            
            //=EMPRESA==============================================
            $razonSocialEmpresaE = $fila['razonSocialEmpresa'];
            
            //=DIVISION===============================================
            $nombreDivisionE = $fila['nombreDivision'];
            
            //=SUB DIVISION============================================
            $nombreSubDivisionE = $fila['nombreSubDivision'];
            
            //=DEPARTAMENTO=========================================
            $nombreDepartamentoE = $fila['nombreDepartamento'];
            
            //=SECCION================================================
            $nombreSeccionE = $fila['nombreSeccion'];
            
            //=PUESTO=================================================
            $nombrePuestoE = $fila['nombrePuesto'];
            
            //=DOCUMENTO============================================
            $descripcionDocumentoE = $fila['descripcionDocumento'];
            
            //=ESTADO CIVIL============================================
            $descripcionEstadoCivilE = $fila['descripcionEstadoCivil'];
            
            //=PROFESION==============================================
            $descripcionProfesionE = $fila['descripcionProfesion'];
            
            //=ENCARGADO============================================ 
            $nombreEncargadoE = $fila['nombreEncargado'];
            
            //========================================================
            $nombreEmpleado = $fila['nombreEmpleado'];
            $apellidoEmpleado = $fila['apellidoEmpleado'];
            $fechaIngreso = $fila['fechaIngreso'];
            $fechaEgreso = $fila['fechaEgreso'];
            $fechaNacimiento = $fila['fechaNacimiento'];
            
            $tipoContrato = $fila['tipoContrato'];
            $consultaTC = "SELECT * FROM select_contrato WHERE numero='$tipoContrato'";
            $ejecutarTC = mysqli_query($con, $consultaTC);
            $filaTC = mysqli_fetch_array($ejecutarTC);
            $tipoContrato = $filaTC['codigo'];
            
            $genero = $fila['genero'];
            $consultaG = "SELECT * FROM select_genero WHERE numero='$genero'";
            $ejecutarG = mysqli_query($con, $consultaG);
            $filaG = mysqli_fetch_array($ejecutarG);
            $genero = $filaG['codigo'];
            
            $escolaridad = $fila['escolaridad'];
            
            $nivelAcademico = $fila['nivelAcademico'];
            $consultaNA = "SELECT * FROM select_nivelacademico WHERE numero='$nivelAcademico'";
            $ejecutarNA = mysqli_query($con, $consultaNA);
            $filaNA = mysqli_fetch_array($ejecutarNA);
            $nivelAcademico = $filaNA['codigo'];
            
            //=DOCUMENTO DE IDENTIFICACON============================
            $numeroIdentificacion = $fila['numeroIdentificacion'];
        
            //=REGION=DEPARTAMENTO=MUNICIPIO========================
            $direccionActual = $fila['direccionActual'];
            
            $region = $fila['region'];
            $consultaR = "SELECT * FROM select_region WHERE numero='$region'";
            $ejecutarR = mysqli_query($con, $consultaR);
            $filaR = mysqli_fetch_array($ejecutarR);
            $region = $filaR['codigo'];
            
            $departamentos = $fila['departamentos'];
            
            $municipio = $fila['municipio'];
            $consultaM = "SELECT * FROM select_municipio WHERE numero='$municipio'";
            $ejecutarM = mysqli_query($con, $consultaM);
            $filaM = mysqli_fetch_array($ejecutarM);
            $municipio = $filaM['codigo'];

            $correo = $fila['correo'];
            $telefono = $fila['telefono'];            
            
            //=ETNIA==================================================
            $etnia = $fila['etnia'];
            $consultaE = "SELECT * FROM select_etnia WHERE numero='$etnia'";
            $ejecutarE = mysqli_query($con, $consultaE);
            $filaE = mysqli_fetch_array($ejecutarE);
            $etnia = $filaE['codigo'];
            
            //=IDIOMA================================================
            $idioma = $fila['idioma'];
            $consultaI = "SELECT * FROM select_idioma WHERE numero='$idioma'";
            $ejecutarI = mysqli_query($con, $consultaI);
            $filaI = mysqli_fetch_array($ejecutarI);
            $idioma = $filaI['codigo'];
            
            $nacionalidad = $fila['nacionalidad'];
            $consultaNC = "SELECT * FROM select_nacionalidad WHERE nombre='$nacionalidad'";
            $ejecutarNC = mysqli_query($con, $consultaNC);
            $filaNC = mysqli_fetch_array($ejecutarNC);
            $nacionalidad = $filaNC['codigo'];
            
            $nit = $fila['nit'];
            
            //=========================================================
            $numeroAfiliacionIgss = $fila['numeroAfiliacionIgss'];
            $irtra = $fila['irtra'];
            $venceIrtra = $fila['venceIrtra'];
            $licencia = $fila['licencia'];
            $tipoLIcencia = $fila['tipoLIcencia'];
            $venceLigencia = $fila['venceLigencia'];
            $cuentaBancaria = $fila['cuentaBancaria'];
            $banco = $fila['banco'];
            $tipoSangre = $fila['tipoSangre'];
            
            //=========================================================
            $emergenciaAvisar = $fila['emergenciaAvisar'];
            $hijos = $fila['hijos'];
            $parentescoEmergemcia = $fila['parentescoEmergemcia'];
            $telefonoEmergencia = $fila['telefonoEmergencia'];
            $beneficiario = $fila['beneficiario'];
            $parentescoBeneficiario = $fila['parentescoBeneficiario'];
            $porcentaje = $fila['porcentaje'];
            
            //=SALARIO================================================
            $salarioOrdinario = $fila['salarioOrdinario'];
            $bonificacionDecreto = $fila['bonificacionDecreto'];
            $bonoProductividad = $fila['bonoProductividad'];
            $totalSueldo = $fila['totalSueldo'];
            
            //=BONIFICACION===========================================
            $bonificacion1 = $fila['bonificacion1'];
            $porcentajeBonificacion1 = $fila['porcentajeBonificacion1'];
            $bonificacion2 = $fila['bonificacion2'];
            $porcentajeBonificacion2 = $fila['porcentajeBonificacion2'];
            $bonificacion3 = $fila['bonificacion3'];
            $porcentajeBonificacion3 = $fila['porcentajeBonificacion3'];
            
            //=ESTADO=================================================
             $estado = $fila['estado'];
            
            //=FECHA=HORA=============================================
            $fechaEmpleado = $fila['fechaEmpleado'];
            $horaEmpleado = $fila['horaEmpleado'];
       
        }elseif($codigoEmpleado == ""){
                                
        }
?>