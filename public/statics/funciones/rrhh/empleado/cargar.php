<?php include_once '../../../on-database.php'?>

<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar">Datos Empleados</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%"  id="tablaDinamicaLoad">
            <thead>
                <tr id='titulo' class=' table-active'>
                    <td>Codigo</td>
                    <td>Estado</td>
                    <td>Empresa</td>
                    <td>Ingreso</td>
                    <td>Egreso</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Nacimiento</td>
                    <td>Tipo Documento</td>
                    <td>Identificación</td>
                    <td>Domicilio</td>
                    <td>Departamento</td>
                    <td>Municipio</td>
                    <td>Nacionalidad</td>
                    <td>Correo</td>
                    <td>Teléfono</td>
                    <td>Género</td>
                    <td>Estado Civil</td>
                    <td>Hijos</td>
                    <td>NIT</td>
                    <td>Profesión</td>
                    <td>Nivel Academico</td>
                    <td>Tipo Contrato</td>
                    <td>Región</td>
                    <td>ETNIA</td>
                    <td>Idioma</td>
                    <td>IGSS</td>
                    <td>IRTRA</td>
                    <td>Vencimiento</td>
                    <td>Licencia</td>
                    <td>Tipo</td>
                    <td>Vencimiento</td>
                    <td>Sangre</td>
                    <td>División</td>
                    <td>Sub División</td>
                    <td>Departamento</td>
                    <td>Puesto</td>
                    <td>Encargado</td>
                    <td>Salario</td>
                    <td>Bonificación</td>
                    <td>Bono Productividad</td>
                    <td>Total</td>
                    <td>No. Bancaria</td>
                    <td>Banco</td>
                    <td>Contacto</td>
                    <td>Parentezco</td>
                    <td>Teléfono</td>
                    <td>Beneficiario</td>
                    <td>Parentezco</td>
                    <td>Porcentaje</td>
                    <td>Teléfono</td>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>

            <tbody>
            <?php

$sql    = "SELECT * FROM empleado ORDER BY codigoEmpleado  DESC";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {

    $datos = $ver[0] . "||" .
        $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3] . "||" .
        $ver[4] . "||" .
        $ver[5] . "||" .
        $ver[6] . "||" .
        $ver[7] . "||" .
        $ver[8] . "||" .
        $ver[9] . "||" .
        $ver[10] . "||" .
        $ver[11] . "||" .
        $ver[12] . "||" .
        $ver[13] . "||" .
        $ver[14] . "||" .
        $ver[15] . "||" .
        $ver[16] . "||" .
        $ver[17] . "||" .
        $ver[18] . "||" .
        $ver[19] . "||" .
        $ver[20] . "||" .
        $ver[21] . "||" .
        $ver[22] . "||" .
        $ver[23] . "||" .
        $ver[24] . "||" .
        $ver[25] . "||" .
        $ver[26] . "||" .
        $ver[27] . "||" .
        $ver[28] . "||" .
        $ver[29] . "||" .
        $ver[30] . "||" .
        $ver[31] . "||" .
        $ver[32] . "||" .
        $ver[33] . "||" .
        $ver[34] . "||" .
        $ver[35] . "||" .
        $ver[36] . "||" .
        $ver[37] . "||" .
        $ver[38] . "||" .
        $ver[39] . "||" .
        $ver[40] . "||" .
        $ver[41] . "||" .
        $ver[42] . "||" .
        $ver[43] . "||" .
        $ver[44] . "||" .
        $ver[45] . "||" .
        $ver[46] . "||" .
        $ver[47] . "||" .
        $ver[48] . "||" .
        $ver[49] . "||" .
        $ver[50] . "||" .
        $ver[51] . "||" .
        $ver[52];
    ?>

            <tr>
                <td><a id="fila0" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[1] ?></a></td>
                <td><a id="fila2" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[2] ?></a></td>
                <td><a id="fila3" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[3] ?></a></td>
                <td><a id="fila4" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[4] ?></a></td>
                <td><a id="fila5" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[5] ?></a></td>
                <td><a id="fila6" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[6] ?></a></td>
                <td><a id="fila7" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[7] ?></a></td>
                <td><a id="fila8" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[8] ?></a></td>
                <td><a id="fila9" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[9] ?></a></td>
                <td><a id="fila10" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[10] ?></a></td>
                <td><a id="fila11" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[11] ?></a></td>
                <td><a id="fila12" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[12] ?></a></td>
                <td><a id="fila13" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[13] ?></a></td>
                <td><a id="fila14" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[14] ?></a></td>
                <td><a id="fila15" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[15] ?></a></td>
                <td><a id="fila16" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[16] ?></a></td>
                <td><a id="fila17" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[17] ?></a></td>
                <td><a id="fila18" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[18] ?></a></td>
                <td><a id="fila19" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[19] ?></a></td>
                <td><a id="fila20" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[20] ?></a></td>
                <td><a id="fila21" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[21] ?></a></td>
                <td><a id="fila22" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[22] ?></a></td>
                <td><a id="fila23" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[23] ?></a></td>
                <td><a id="fila24" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[24] ?></a></td>
                <td><a id="fila25" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[25] ?></a></td>
                <td><a id="fila26" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[26] ?></a></td>
                <td><a id="fila27" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[27] ?></a></td>
                <td><a id="fila28" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[28] ?></a></td>
                <td><a id="fila29" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[29] ?></a></td>
                <td><a id="fila30" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[30] ?></a></td>
                <td><a id="fila31" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[31] ?></a></td>
                <td><a id="fila32" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[32] ?></a></td>
                <td><a id="fila33" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[33] ?></a></td>
                <td><a id="fila34" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[34] ?></a></td>
                <td><a id="fila35" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[35] ?></a></td>
                <td><a id="fila36" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[36] ?></a></td>
                <td><a id="fila37" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[37] ?></a></td>
                <td><a id="fila38" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[38] ?></a></td>
                <td><a id="fila39" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[39] ?></a></td>
                <td><a id="fila40" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[40] ?></a></td>
                <td><a id="fila41" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[41] ?></a></td>
                <td><a id="fila42" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[42] ?></a></td>
                <td><a id="fila43" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[43] ?></a></td>
                <td><a id="fila44" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[44] ?></a></td>
                <td><a id="fila45" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[45] ?></a></td>
                <td><a id="fila46" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[46] ?></a></td>
                <td><a id="fila47" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[47] ?></a></td>
                <td><a id="fila48" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[48] ?></a></td>
                <td><a id="fila49" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[49] ?></a></td>
                <td><a id="fila50" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[50] ?></a></td>
                <td><a id="fila51" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[51] ?></a></td>
                <td><a id="fila52" href='empleado.php?codigoEmpleado=<?php echo $ver[0] ?>'><?php echo $ver[52] ?></a></td>
                <td><button type="button" class="vutton" id="button"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
            <?php
}
?>
             </tbody>
              <tfoot>
                <tr id='titulo' class=' table-active'>
                    <td>Codigo</td>
                    <td>Estado</td>
                    <td>Empresa</td>
                    <td>Ingreso</td>
                    <td>Egreso</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Nacimiento</td>
                    <td>Tipo Documento</td>
                    <td>Identificación</td>
                    <td>Domicilio</td>
                    <td>Departamento</td>
                    <td>Municipio</td>
                    <td>Nacionalidad</td>
                    <td>Correo</td>
                    <td>Teléfono</td>
                    <td>Género</td>
                    <td>Estado Civil</td>
                    <td>Hijos</td>
                    <td>NIT</td>
                    <td>Profesión</td>
                    <td>Nivel Academico</td>
                    <td>Tipo Contrato</td>
                    <td>Región</td>
                    <td>ETNIA</td>
                    <td>Idioma</td>
                    <td>IGSS</td>
                    <td>IRTRA</td>
                    <td>Vencimiento</td>
                    <td>Licencia</td>
                    <td>Tipo</td>
                    <td>Vencimiento</td>
                    <td>Sangre</td>
                    <td>División</td>
                    <td>Sub División</td>
                    <td>Departamento</td>
                    <td>Puesto</td>
                    <td>Encargado</td>
                    <td>Salario</td>
                    <td>Bonificación</td>
                    <td>Bono Productividad</td>
                    <td>Total</td>
                    <td>No. Bancaria</td>
                    <td>Banco</td>
                    <td>Contacto</td>
                    <td>Parentezco</td>
                    <td>Teléfono</td>
                    <td>Beneficiario</td>
                    <td>Parentezco</td>
                    <td>Porcentaje</td>
                    <td>Teléfono</td>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<style type="text/css">
    .nombre-tabla{
        background-color: #f7f7f7;
        padding: 5px;
        padding-left: 10px;
        border: solid 1px #f5f5f5;
        border-radius: 4px;
        text-align: center;
        font-weight: 700;
        margin-bottom: -31px;
        margin-top: 5px;
    }
    .dt-buttons{
        margin-top: -2px;
        margin-left: 5px;
    }
    .input-sm{
        margin-right: 5px;
    }
    table tr:nth-child(even) {
        background-color: #eee;
    }
    tfoot td{
        color: black;
        border: solid 1px transparent;
        font-size: 11px;
        font-weight: 700;
    }
    .vutton{
        color: red;
        border-color: transparent;
        font-size: 12px;
        background-color: transparent;
    }
    .vutton:hover{
        color: darkred;
    }
    .selected{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 500;
    }
    .selected:hover{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 500;
    }
    @media (max-width: 774px) {
        .buttons-excel{
            float: left;
        }
    }

    @media (max-width: 375px) {
        .dt-buttons{
            margin-top: 0px;
            margin-left: 0px;
        }
        .input-sm{
            margin-right: 0px;
        }
        .buttons-excel{
            float: left;
            width: 100%;
        }
        #tablaDinamicaLoad_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaDinamicaLoad_filter label .input-sm{
            width: 90%;
        }
        #tablaDinamicaLoad_filter{
            margin-top: 10px;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('#tablaDinamicaLoad').DataTable( {
            "order": [[ 1, 'asc' ]],
            "scrollY":        "180px",
            "scrollCollapse": true,
            "paging":         false,
            //"ordering":       false,
            "info":           false,
                dom: 'Bfrtip',
                buttons: [
                //'copyHtml5',
                'excelHtml5',
                //'csvHtml5'
                //'pdfHtml5'
            ],
            language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "info": " _PAGE_ of _PAGES_",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
            scrollX: true,
        } );
        var table = $('#tablaDinamicaLoad').DataTable();
        $('#tablaDinamicaLoad tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    } );
</script>