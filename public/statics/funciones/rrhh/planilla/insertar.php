<?php include_once '../../../on-database.php'?>

<?php

$codigoEmpleado = $_POST['codigoEmpleado'];
$consulta       = "SELECT * FROM empleado WHERE codigoEmpleado='$codigoEmpleado'";
$ejecutar       = mysqli_query($con, $consulta);
$fila           = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $codigoPlanilla     = $_POST['codigoPlanilla'];
    $codigoEmpleado     = $_POST['codigoEmpleado'];
    $diasTrabajados     = $_POST['diasTrabajados'];
    $ordinario          = $_POST['ordinario'];
    $diasVacaciones     = $_POST['diasVacaciones'];
    $sueldoVacaciones   = $_POST['sueldoVacaciones'];
    $otrosIngresos      = $_POST['otrosIngresos'];
    $devengando         = $_POST['devengando'];
    $igss               = $_POST['igss'];
    $horasDia           = $_POST['horasDia'];
    $horasNoche         = $_POST['horasNoche'];
    $extraordinario     = $_POST['extraordinario'];
    $anticipoSueldo     = $_POST['anticipoSueldo'];
    $descuentosLegales  = $_POST['descuentosLegales'];
    $isr                = $_POST['isr'];
    $solidarismo        = $_POST['solidarismo'];
    $otrosDescuentos    = $_POST['otrosDescuentos'];
    $totalDescuentos    = $_POST['totalDescuentos'];
    $liquido            = $_POST['liquido'];
    $cuarentaPorcientoI = $_POST['40PorcientoI'];
    $cuarentaPorcientoF = $_POST['40PorcientoF'];
    $sesentaPorcientoI  = $_POST['60PorcientoI'];
    $sesentaPorcientoF  = $_POST['60PorcientoF'];

    $fechaPlanilla = $_POST['fechaPlanilla'];
    $horaPlanilla  = $_POST['horaPlanilla'];

    $actualizar = "UPDATE planilla SET codigoPlanilla='$codigoPlanilla',diasTrabajados='$diasTrabajados',ordinario='$ordinario',diasVacaciones='$diasVacaciones',sueldoVacaciones='$sueldoVacaciones',otrosIngresos='$otrosIngresos',devengando='$devengando',igss='$igss', horasDia='$horasDia', horasNoche='$horasNoche', extraordinario='$extraordinario',anticipoSueldo='$anticipoSueldo',descuentosLegales='$descuentosLegales',isr='$isr',solidarismo='$solidarismo',otrosDescuentos='$otrosDescuentos',totalDescuentos='$totalDescuentos',liquido='$liquido',40PorcientoI='$cuarentaPorcientoI',40PorcientoF='$cuarentaPorcientoF',60PorcientoI='$sesentaPorcientoI',60PorcientoF='$sesentaPorcientoF',fechaPlanilla='$fechaPlanilla',horaPlanilla='$horaPlanilla' WHERE codigoEmpleado='$codigoEmpleado'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito La Planilla !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $codigoPlanilla     = $_POST['codigoPlanilla'];
    $codigoEmpleado     = $_POST['codigoEmpleado'];
    $diasTrabajados     = $_POST['diasTrabajados'];
    $ordinario          = $_POST['ordinario'];
    $diasVacaciones     = $_POST['diasVacaciones'];
    $sueldoVacaciones   = $_POST['sueldoVacaciones'];
    $otrosIngresos      = $_POST['otrosIngresos'];
    $devengando         = $_POST['devengando'];
    $igss               = $_POST['igss'];
    $horasDia           = $_POST['horasDia'];
    $horasNoche         = $_POST['horasNoche'];
    $extraordinario     = $_POST['extraordinario'];
    $anticipoSueldo     = $_POST['anticipoSueldo'];
    $descuentosLegales  = $_POST['descuentosLegales'];
    $isr                = $_POST['isr'];
    $solidarismo        = $_POST['solidarismo'];
    $otrosDescuentos    = $_POST['otrosDescuentos'];
    $totalDescuentos    = $_POST['totalDescuentos'];
    $liquido            = $_POST['liquido'];
    $cuarentaPorcientoI = $_POST['40PorcientoI'];
    $cuarentaPorcientoF = $_POST['40PorcientoF'];
    $sesentaPorcientoI  = $_POST['60PorcientoI'];
    $sesentaPorcientoF  = $_POST['60PorcientoF'];

    $fechaPlanilla = $_POST['fechaPlanilla'];
    $horaPlanilla  = $_POST['horaPlanilla'];

    $agregar = "INSERT INTO planilla (codigoPlanilla,codigoEmpleado,diasTrabajados,ordinario,diasVacaciones,sueldoVacaciones,otrosIngresos,devengando,igss, horasDia, horasNoche, extraordinario,anticipoSueldo,descuentosLegales,isr,solidarismo,otrosDescuentos,totalDescuentos,liquido,40PorcientoI,40PorcientoF,60PorcientoI,60PorcientoF,fechaPlanilla,horaPlanilla)
        VALUES ('$codigoPlanilla','$codigoEmpleado','$diasTrabajados','$ordinario','$diasVacaciones','$sueldoVacaciones','$otrosIngresos', '$devengando','$igss', '$horasDia', '$horasNoche','$extraordinario','$anticipoSueldo','$descuentosLegales','$isr','$solidarismo','$otrosDescuentos','$totalDescuentos','$liquido','$cuarentaPorcientoI','$cuarentaPorcientoF','$sesentaPorcientoI','$sesentaPorcientoF','$fechaPlanilla','$horaPlanilla' )";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito La Planilla !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>