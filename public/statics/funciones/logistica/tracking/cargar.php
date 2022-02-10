<?php include_once '../../../on-database.php'?>
<div class="container-fluid">
    <div class="row" >
        <h3 class="nombre-tabla ocultar">Datos Tracking</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%" id="tablaTracking">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M1">Producto</td>
                    <td id="M1">Toneladas</td>
                    <td id="M1">Placa</td>
                    <td id="M1">Estatus</td>
                    <td id="M1">Día Carga</td>
                    <td id="M1">Fecha Carga</td>
                    <td id="M1">Restricción</td>
                    <td id="M1">Fecha</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora Llegada</td>
                    <td id="M1">Fecha Llegada</td>
                    <td id="M1">Hora Descarga</td>
                    <td id="M1">Fecha Descarga</td>
                    <td id="M1">ID</td>
                </tr>
            </thead>
            <tbody>
            <?php
$sql    = "SELECT * FROM tracking ORDER BY diaCarga DESC";
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
        $ver[21];
    ?>
            <tr>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[1] ?></a></td>
                <td><a id="fila2" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[2] ?></a></td>
                <td><a id="fila3" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[3] ?></a></td>
                <td><a id="fila4" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[4] ?></a></td>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[5] ?></a></td>
                <td><a id="fila1" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[6] ?></a></td>
                <td><a id="fila2" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[7] ?></a></td>
                <td><a id="fila3" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[8] ?></a></td>
                <td><a id="fila4" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[9] ?></a></td>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[10] ?></a></td>
                <td><a id="fila1" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[11] ?></a></td>
                <td><a id="fila2" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[12] ?></a></td>
                <td><a id="fila3" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[13] ?></a></td>
                <td><a id="fila4" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[14] ?></a></td>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[15] ?></a></td>
                <td><a id="fila1" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[16] ?></a></td>
                <td><a id="fila2" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[17] ?></a></td>
                <td><a id="fila3" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[18] ?></a></td>
                <td><a id="fila4" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[19] ?></a></td>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[20] ?></a></td>
                <td><a id="fila0" href='tracking.php?id=<?php echo $ver[21] ?>'><?php echo $ver[21] ?></a></td>
            </tr>
            <?php
}
?>
             </tbody>
              <tfoot>
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id="M1">Producto</td>
                    <td id="M1">Toneladas</td>
                    <td id="M1">Placa</td>
                    <td id="M1">Estatus</td>
                    <td id="M1">Día Carga</td>
                    <td id="M1">Fecha Carga</td>
                    <td id="M1">Restricción</td>
                    <td id="M1">Fecha</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora</td>
                    <td id="M1">Ubicación</td>
                    <td id="M1">Hora Llegada</td>
                    <td id="M1">Fecha Llegada</td>
                    <td id="M1">Hora Descarga</td>
                    <td id="M1">Fecha Descarga</td>
                    <td id="M1">ID</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<style type="text/css">
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
    #fila1{
        font-size: 11px;
        /*text-transform: uppercase;*/
    }
    .nombre-tabla{
        text-align: center;
        font-weight: 700;
        margin-bottom: -31px;
        margin-top: 5px;
        background-color: #f7f7f7;
        height: 40px;
        line-height: 40px;
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
    tfoot td{
        color: black;
        border: solid 1px transparent;
        font-size: 11px;
        font-weight: 700;
    }
    .selected{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 700;
    }
    .selected:hover{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 650;
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
        #tablaTracking_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaTracking_filter label .input-sm{
            width: 90%;
        }
        #tablaTracking_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('#tablaTracking').DataTable( {
            "order": [[ 3, 'asc' ]],
            "scrollY":        "200px",
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
        var table = $('#tablaTracking').DataTable();
        $('#tablaTracking tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        $('.vutton').click( function () {
            table.row('.selected').remove().draw( true );
        } );
    } );
</script>
<!--<script>
$(document).ready(function() {
    $('#tablaFlete').DataTable( {
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
} );
</script>-->
