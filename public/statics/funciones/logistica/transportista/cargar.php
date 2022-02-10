<?php include_once '../../../on-database.php'?>
<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar">Datos Transportista</h3>
        <table class="display table-bordered table-hover" style="width:100%"  id="tablaTransportista">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Códgo</td>
                    <td id="M1">NIT</td>
                    <td id="M2">Nombre Comercial</td>
                    <td id="M3">Contacto</td>
                    <td id="M4">Teléfono</td>
                    <td id="M5">Correo</td>
                    <td id="M6">Fecha</td>
                    <td id="M7">Hora</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>
            <tbody>
            <?php
$sql    = "SELECT * FROM transportista ORDER BY codigo  DESC";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {
    $datos = $ver[0] . "||" .
        $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3] . "||" .
        $ver[4] . "||" .
        $ver[5] . "||" .
        $ver[6] . "||" .
        $ver[7];
    ?>
            <tr>
                <td><a id="fila0" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[1] ?></a></td>
                <td><a id="fila2" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[2] ?></a></td>
                <td><a id="fila3" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[3] ?></a></td>
                <td><a id="fila4" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[4] ?></a></td>
                <td><a id="fila5" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[5] ?></a></td>
                <td><a id="fila6" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[6] ?></a></td>
                <td><a id="fila7" onclick="transportista('<?php echo $datos ?>')"><?php echo $ver[7] ?></a></td>
                <td><button type="button" class="vutton" id="button"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
            <?php
}
?>
             </tbody>
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
        #tablaTransportista_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaTransportista_filter label .input-sm{
            width: 90%;
        }
        #tablaTransportista_filter{
            margin-top: 10px;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('#tablaTransportista').DataTable( {
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
        var table = $('#tablaTransportista').DataTable();
        $('#tablaTransportista tbody').on( 'click', 'tr', function () {
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

<!--<script>
$(document).ready(function() {
    $('#tablaTransportista').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
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
