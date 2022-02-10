<div class="container-fluid">
    <div class="row" >
        <h3 class="nombre-tabla ocultar">Datos Unidad de Medida</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%"  id="tablaUnidadMedida">
            <thead>
                <tr id='titulo' class='table-active'>
                        <td id="M0">Código</td>
                        <td id="M2">Unidad</td>
                </tr>
            </thead>

            <tbody>
            <?php

$sql    = "SELECT * FROM unidadsuministros ORDER BY codigo DESC";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {

    $datos = $ver[0] . "||" .
        $ver[1] . "||" ;
    ?>

            <tr>
                <td><a id="fila0" onclick="unidad('<?php echo $datos ?>')"><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" onclick="unidad('<?php echo $datos ?>')"><?php echo $ver[1] ?></a></td>
                  </tr>
            <?php
}
?>
             </tbody>
             <tfoot class="ocultar1">
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                       <td id="M0">Código</td>
                        <td id="M2">Unidad</td>
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
        #tablaUnidadMedida_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaUnidadMedida_filter label .input-sm{
            width: 90%;
        }
        #tablaUnidadMedida_filter{
            margin-top: 10px;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('#tablaUnidadMedida').DataTable( {
            "order": [[ 0, 'desc' ]],
            "scrollY":        "220px",
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
        var table = $('#tablaUnidadMedida').DataTable();
        $('#tablaUnidadMedida tbody').on( 'click', 'tr', function () {
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