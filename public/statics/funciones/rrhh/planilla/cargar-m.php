<?php include_once '../../../on-database.php';?>
<div class="container-fluid">
    <div class="row" >
    <table class="display table-bordered table-hover" style="width:100%"  id="tablaPlanillaV">
      <thead>
        <tr id='titulo' class='table-active'>
          <td>Código</td>
          <td>Departamento</td>
        </tr>
      </thead>
      <tbody>
      <?php
//$sql="SELECT * FROM planilla ORDER BY codigoEmpleado DESC";
$sql = "SELECT * FROM empleado
                INNER JOIN planilla
                ON empleado.codigoEmpleado=planilla.codigoEmpleado WHERE estado = 'Activo' ";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {
    $datos = $ver[0] . "||" .
        $ver[2] . "||" .
        $ver[3] . "||" .
        $ver[6] . "||" .
        $ver[31] . "||" .
        $ver[47] . "||" .
        $ver[48] . "||" .
        $ver[49] . "||" .
        $ver[50] . "||" .
        $ver[60] . "||" .
        $ver[62] . "||" .
        $ver[63] . "||" .
        $ver[64] . "||" .
        $ver[65] . "||" .
        $ver[66] . "||" .
        $ver[67] . "||" .
        $ver[68] . "||" .
        $ver[69] . "||" .
        $ver[70] . "||" .
        $ver[71] . "||" .
        $ver[72] . "||" .
        $ver[73] . "||" .
        $ver[74] . "||" .
        $ver[75] . "||" .
        $ver[76] . "||" .
        $ver[77] . "||" .
        $ver[78] . "||" .
        $ver[79] . "||" .
        $ver[80] . "||" .
        $ver[81] . "||" .
        $ver[82] . "||" .
        $ver[83];
    ?>
      <tr>
        <td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><a style="text-decoration: none; color: black; cursor: pointer; padding-left: 1px; padding-right: 1px;" onclick="seleccionarPlanilla('<?php echo $datos; ?>')"><?php echo $ver[0]; ?></a></td>
        <!--<td><a id="fila1" onclick="seleccionarPlanilla('<?php echo $datos; ?>')"><?php echo $ver[2]; ?></a></td>
        <td><a id="fila2" onclick="seleccionarPlanilla('<?php echo $datos; ?>')"><?php echo $ver[3]; ?></a></td>-->
        <td class="col-xs-7 col-sm-7 col-md-7 col-lg-7"><a style="text-decoration: none; color: black; cursor: pointer; padding-left: 1px; padding-right: 1px;" onclick="seleccionarPlanilla('<?php echo $datos; ?>')"><?php echo $ver[6]; ?></a></td>
        <!--<td><a id="fila4" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[31] ?></a></td>
        <td><a id="fila5" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[47] ?></a></td>
        <td><a id="fila6" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[48] ?></a></td>
        <td><a id="fila7" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[49] ?></a></td>
        <td><a id="fila8" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[50] ?></a></td>
        <td><a id="fila9" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[60] ?></a></td>
        <td><a id="fila10" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[62] ?></a></td>
        <td><a id="fila11" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[63] ?></a></td>
        <td><a id="fila12" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[64] ?></a></td>
        <td><a id="fila13" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[65] ?></a></td>
        <td><a id="fila14" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[66] ?></a></td>
        <td><a id="fila15" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[67] ?></a></td>
        <td><a id="fila16" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[68] ?></a></td>
        <td><a id="fila17" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[69] ?></a></td>
        <td><a id="fila18" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[70] ?></a></td>
        <td><a id="fila19" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[71] ?></a></td>
        <td><a id="fila20" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[72] ?></a></td>
        <td><a id="fila21" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[73] ?></a></td>
        <td><a id="fila22" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[74] ?></a></td>
        <td><a id="fila23" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[75] ?></a></td>
        <td><a id="fila24" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[76] ?></a></td>
        <td><a id="fila25" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[77] ?></a></td>
        <td><a id="fila26" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[78] ?></a></td>
        <td><a id="fila27" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[79] ?></a></td>
        <td><a id="fila28" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[80] ?></a></td>
        <td><a id="fila29" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[81] ?></a></td>
        <td><a id="fila30" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[82] ?></a></td>
        <td><a id="fila29" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[83] ?></a></td>
        <td><a id="fila30" onclick="seleccionarPlanilla('<?php echo $datos ?>')"><?php echo $ver[84] ?></a></td>-->
      </tr>
      <?php
}
?>
       </tbody>
    </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tablaPlanillaV').DataTable( {
            dom: 'Bfrtip',
            buttons: [
        ],
         "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                //"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfo":           "Registros_START_ al _END_ de _TOTAL_ ",
                //"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoEmpty":      "0 Registros",
                 "info": " _PAGE_ of _PAGES_",
                "sInfoFiltered":   "",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     ">>",
                    "sPrevious": "<<"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            }
    } );
} );
</script>