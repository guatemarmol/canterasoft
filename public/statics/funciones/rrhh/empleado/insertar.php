<?php include_once '../../../on-database.php'?>

<?php
$codigoEmpleado = $_POST['codigoEmpleado'];
$consulta       = "SELECT * FROM empleado WHERE codigoEmpleado='$codigoEmpleado'";
$ejecutar       = mysqli_query($con, $consulta);
$fila           = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $codigoEmpleado = $_POST['codigoEmpleado'];
    ///////////////////////////////////////////////////////////
    $estado = $_POST['estado'];
    if ($estado == 'Activo') {
        $estado = 'Activo';
    } else {
        $estado = 'Suspendido';
    }
    ///////////////////////////////////////////////////////////
    $razonSocialEmpresa = $_POST['razonSocialEmpresaE'];
    $fechaIngreso       = $_POST['fechaIngreso'];
    $fechaEgreso        = $_POST['fechaEgreso'];
    $nombreEmpleado     = $_POST['nombreEmpleado'];
    $apellidoEmpleado   = $_POST['apellidoEmpleado'];
    $fechaNacimiento    = $_POST['fechaNacimiento'];
    ///////////////////////////////////////////////////////////
    $tipoDocumento        = $_POST['tipoDocumento'];
    $doc0                 = $_POST['documentoIdentificacion0'];
    $doc1                 = $_POST['documentoIdentificacion1'];
    $doc2                 = $_POST['documentoIdentificacion2'];
    $numeroIdentificacion = $doc0 . " " . $doc1 . " " . $doc2;
    ///////////////////////////////////////////////////////////
    $direccionActual = $_POST['direccionActual'];
    $departamentos   = $_POST['departamentos'];
    ///////////////////////////////////////////////////////////
    $municipio = $_POST['municipio'];
    $municipio = explode(" ", $municipio);
    $municipio = $municipio[0];
    ///////////////////////////////////////////////////////////
    $nacionalidad = $_POST['nacionalidad'];
    $nacionalidad = explode(" ", $nacionalidad);
    $nacionalidad = $nacionalidad[0];
    ///////////////////////////////////////////////////////////
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];
    ///////////////////////////////////////////////////////////
    $genero = $_POST['genero'];
    $genero = explode(" ", $genero);
    $genero = $genero[0];
    ///////////////////////////////////////////////////////////
    $estadoCivil = $_POST['estadoCivil'];
    $hijos       = $_POST['hijos'];
    $nit         = $_POST['nit'];
    $profesion   = $_POST['profesion'];
    ///////////////////////////////////////////////////////////
    $nivelAcademico = $_POST['nivelAcademico'];
    $nivelAcademico = explode(" ", $nivelAcademico);
    $nivelAcademico = $nivelAcademico[0];
    ///////////////////////////////////////////////////////////
    $tipoContrato = $_POST['tipoContrato'];
    $tipoContrato = explode(" ", $tipoContrato);
    $tipoContrato = $tipoContrato[0];
    ///////////////////////////////////////////////////////////
    $region = $_POST['region'];
    $region = explode(" ", $region);
    $region = $region[0];
    ///////////////////////////////////////////////////////////
    $etnia = $_POST['etnia'];
    $etnia = explode(" ", $etnia);
    $etnia = $etnia[0];
    ///////////////////////////////////////////////////////////
    $idioma = $_POST['idioma'];
    $idioma = explode(" ", $idioma);
    $idioma = $idioma[0];
    ///////////////////////////////////////////////////////////
    $igss          = $_POST['igss'];
    $irtra         = $_POST['irtra'];
    $venceIrtra    = $_POST['venceIrtra'];
    $licencia      = $_POST['licencia'];
    $tipoLIcencia  = $_POST['tipoLIcencia'];
    $venceLigencia = $_POST['venceLigencia'];
    $tipoSangre    = $_POST['tipoSangre'];
    ///////////////////////////////////////////////////////////
    $nombreDivision     = $_POST['nombreDivisionE'];
    $nombreSubDivision  = $_POST['nombreSubDivisionE'];
    $nombreDepartamento = $_POST['nombreDepartamentoE'];
    $nombrePuesto       = $_POST['nombrePuestoE'];
    $nombreEncargado    = $_POST['nombreEncargadoE'];
    ///////////////////////////////////////////////////////////
    $salarioOrdinario    = $_POST['salarioOrdinario'];
    $bonificacionDecreto = $_POST['bonificacionDecreto'];
    $bonoProductividad   = $_POST['bonoProductividad'];
    $totalSueldo         = $_POST['totalSueldo'];
    ///////////////////////////////////////////////////////////
    $cuentaBancaria = $_POST['cuentaBancaria'];
    $banco          = $_POST['banco'];
    ///////////////////////////////////////////////////////////
    $contactoE    = $_POST['contactoE'];
    $parentescoE  = $_POST['parentescoE'];
    $telefonoE    = $_POST['telefonoE'];
    $beneficiario = $_POST['beneficiario'];
    $parentescoB  = $_POST['parentescoB'];
    $porcentajeB  = $_POST['porcentajeB'];
    $telefonoB    = $_POST['telefonoB'];
    ///////////////////////////////////////////////////////////
    $fecha = $_POST['fecha'];
    $hora  = $_POST['hora'];

    $actualizar = "UPDATE empleado SET
    estado='$estado',razonSocialEmpresa='$razonSocialEmpresa',
    fechaIngreso='$fechaIngreso',fechaEgreso='$fechaEgreso',nombreEmpleado='$nombreEmpleado',apellidoEmpleado='$apellidoEmpleado',fechaNacimiento='$fechaNacimiento',tipoDocumento='$tipoDocumento',numeroIdentificacion='$numeroIdentificacion',direccionActual='$direccionActual',departamentos='$departamentos',municipio='$municipio',nacionalidad='$nacionalidad',correo='$correo',telefono='$telefono',genero='$genero',estadoCivil='$estadoCivil',hijos='$hijos',nit='$nit',profesion='$profesion',nivelAcademico='$nivelAcademico',tipoContrato='$tipoContrato',region='$region',etnia='$etnia',idioma='$idioma',igss='$igss',irtra='$irtra',venceIrtra='$venceIrtra',licencia='$licencia',,tipoLIcencia='$tipoLIcencia',venceLigencia='$venceLigencia',tipoSangre='$tipoSangre',nombreDivision='$nombreDivision', nombreSubDivision='$nombreSubDivision',nombreDepartamento='$nombreDepartamento',nombrePuesto='$nombrePuesto',nombreEncargado='$nombreEncargado',salarioOrdinario='$salarioOrdinario',bonificacionDecreto='$bonificacionDecreto',bonoProductividad='$bonoProductividad',totalSueldo='$totalSueldo',cuentaBancaria='$cuentaBancaria',banco='$banco',contactoE='$contactoE',parentescoE='$parentescoE',telefonoE='$telefonoE',beneficiario='$beneficiario',parentescoB='$parentescoB',porcentajeB='$porcentajeB',telefonoB='$telefonoB',fecha='$fecha',hora='$hora' WHERE codigoEmpleado='$codigoEmpleado'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito el Empleado !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $codigoEmpleado = $_POST['codigoEmpleado'];
    $estado         = $_POST['estado'];

    if ($estado == 'Activo') {
        $estado = 'Activo';
    } else {
        $estado = 'Suspendido';
    }
    ///////////////////////////////////////////////////////////
    $razonSocialEmpresa = $_POST['razonSocialEmpresaE'];
    $fechaIngreso       = $_POST['fechaIngreso'];
    $fechaEgreso        = $_POST['fechaEgreso'];
    $nombreEmpleado     = $_POST['nombreEmpleado'];
    $apellidoEmpleado   = $_POST['apellidoEmpleado'];
    $fechaNacimiento    = $_POST['fechaNacimiento'];
    ///////////////////////////////////////////////////////////
    $tipoDocumento        = $_POST['tipoDocumento'];
    $doc0                 = $_POST['documentoIdentificacion0'];
    $doc1                 = $_POST['documentoIdentificacion1'];
    $doc2                 = $_POST['documentoIdentificacion2'];
    $numeroIdentificacion = $doc0 . "-" . $doc1 . "-" . $doc2;
    ///////////////////////////////////////////////////////////
    $direccionActual = $_POST['direccionActual'];
    $departamentos   = $_POST['departamentos'];
    ///////////////////////////////////////////////////////////
    $municipio = $_POST['municipio'];
    $municipio = explode(" ", $municipio);
    $municipio = $municipio[0];
    ///////////////////////////////////////////////////////////
    $nacionalidad = $_POST['nacionalidad'];
    $nacionalidad = explode(" ", $nacionalidad);
    $nacionalidad = $nacionalidad[0];
    ///////////////////////////////////////////////////////////
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];
    ///////////////////////////////////////////////////////////
    $genero = $_POST['genero'];
    $genero = explode(" ", $genero);
    $genero = $genero[0];
    ///////////////////////////////////////////////////////////
    $estadoCivil = $_POST['estadoCivil'];
    $hijos       = $_POST['hijos'];
    $nit         = $_POST['nit'];
    $profesion   = $_POST['profesion'];
    ///////////////////////////////////////////////////////////
    $nivelAcademico = $_POST['nivelAcademico'];
    $nivelAcademico = explode(" ", $nivelAcademico);
    $nivelAcademico = $nivelAcademico[0];
    ///////////////////////////////////////////////////////////
    $tipoContrato = $_POST['tipoContrato'];
    $tipoContrato = explode(" ", $tipoContrato);
    $tipoContrato = $tipoContrato[0];
    ///////////////////////////////////////////////////////////
    $region = $_POST['region'];
    $region = explode(" ", $region);
    $region = $region[0];
    ///////////////////////////////////////////////////////////
    $etnia = $_POST['etnia'];
    $etnia = explode(" ", $etnia);
    $etnia = $etnia[0];
    ///////////////////////////////////////////////////////////
    $idioma = $_POST['idioma'];
    $idioma = explode(" ", $idioma);
    $idioma = $idioma[0];
    ///////////////////////////////////////////////////////////
    $igss          = $_POST['igss'];
    $irtra         = $_POST['irtra'];
    $venceIrtra    = $_POST['venceIrtra'];
    $licencia      = $_POST['licencia'];
    $tipoLIcencia  = $_POST['tipoLIcencia'];
    $venceLigencia = $_POST['venceLigencia'];
    $tipoSangre    = $_POST['tipoSangre'];
    ///////////////////////////////////////////////////////////
    $nombreDivision     = $_POST['nombreDivisionE'];
    $nombreSubDivision  = $_POST['nombreSubDivisionE'];
    $nombreDepartamento = $_POST['nombreDepartamentoE'];
    $nombrePuesto       = $_POST['nombrePuestoE'];
    $nombreEncargado    = $_POST['nombreEncargadoE'];
    ///////////////////////////////////////////////////////////
    $salarioOrdinario    = $_POST['salarioOrdinario'];
    $bonificacionDecreto = $_POST['bonificacionDecreto'];
    $bonoProductividad   = $_POST['bonoProductividad'];
    $totalSueldo         = $_POST['totalSueldo'];
    ///////////////////////////////////////////////////////////
    $cuentaBancaria = $_POST['cuentaBancaria'];
    $banco          = $_POST['banco'];
    ///////////////////////////////////////////////////////////
    $contactoE    = $_POST['contactoE'];
    $parentescoE  = $_POST['parentescoE'];
    $telefonoE    = $_POST['telefonoE'];
    $beneficiario = $_POST['beneficiario'];
    $parentescoB  = $_POST['parentescoB'];
    $porcentajeB  = $_POST['porcentajeB'];
    $telefonoB    = $_POST['telefonoB'];
    ///////////////////////////////////////////////////////////
    $fecha = $_POST['fecha'];
    $hora  = $_POST['hora'];

    $agregar = "INSERT INTO empleado (codigoEmpleado,estado,razonSocialEmpresa,
    fechaIngreso,fechaEgreso,nombreEmpleado,apellidoEmpleado,fechaNacimiento,tipoDocumento,numeroIdentificacion,direccionActual,departamentos,municipio,nacionalidad,correo,telefono,genero,estadoCivil,hijos,nit,profesion,nivelAcademico,tipoContrato,region,etnia,idioma,igss,irtra,venceIrtra,licencia,tipoLIcencia,venceLigencia,tipoSangre,nombreDivision,nombreSubDivision,nombreDepartamento,nombrePuesto,nombreEncargado,salarioOrdinario,bonoProductividad,totalSueldo,cuentaBancaria,banco,contactoE,parentescoE,telefonoE,beneficiario,parentescoB,porcentajeB,telefonoB,fecha,hora) VALUES ('$codigoEmpleado,'$estado,'$razonSocialEmpresa,
    '$fechaIngreso','$fechaEgreso','$nombreEmpleado','$apellidoEmpleado','$fechaNacimiento','$tipoDocumento','$numeroIdentificacion','$direccionActual','$departamentos','$municipio','$nacionalidad','$correo','$telefono','$genero','$estadoCivil','$hijos','$nit','$profesion','$nivelAcademico','$tipoContrato','$region','$etnia','$idioma','$igss','$irtra','$venceIrtra','$licencia','$tipoLIcencia','$venceLigencia','$tipoSangre','$nombreDivision','$nombreSubDivision','$nombreDepartamento','$nombrePuesto','$nombreEncargado','$salarioOrdinario','$bonoProductividad','$totalSueldo','$cuentaBancaria','$banco','$contactoE','$parentescoE','$telefonoE','$beneficiario','$parentescoB','$porcentajeB','$telefonoB','$fecha','$hora')";

    mysqli_query($con, $agregar);

    $agregarPlanilla = "INSERT INTO planilla (codigoEmpleado)VALUES('$codigoEmpleado')";
    mysqli_query($con, $agregarPlanilla);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito el Empleado !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>