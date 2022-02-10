<?php include_once '../../../on-database.php'
?>
<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar">Datos Packing List Cliente</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaPackingListCliente">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Código</td>
                    <td id="M1">Tipo</td>
                    <td id="M1">No. Pedido</td>
                    <td id="M1">Cliente</td>
                    <td id="M1">Orden Compra</td>
                    <td id="M2">Packing List</td>
                    <td id="M4">Transporte</td>
                    <td id="M5">Piloto</td>
                    <td id="M6">Placa</td>
                    <td id="M1">Plataforma</td>
                    <td id="M7">Fecha</td>
                    <td id="M8">Hora</td>
                    <td id="M1"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>
            <tbody>
            <?php
$sql    = "SELECT * FROM packingCliente ORDER BY codigo DESC LIMIT 5";
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
        $ver[11];
    ?>
            <tr>
                <td><a id="fila0" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[1] ?></a></td>
                <td><a id="fila2" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[2] ?></a></td>
                <td><a id="fila3" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[3] ?></a></td>
                <td><a id="fila4" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[4] ?></a></td>
                <td><a id="fila5" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[5] ?></a></td>
                <td><a id="fila6" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[6] ?></a></td>
                <td><a id="fila7" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[7] ?></a></td>
                <td><a id="fila8" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[8] ?></a></td>
                <td><a id="fila8" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[9] ?></a></td>
                <td><a id="fila8" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[10] ?></a></td>
                <td><a id="fila8" href='packing-list.php?codigo=<?php echo $ver[0] ?>'><?php echo $ver[11] ?></a></td>
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
        #tablaPackingListCliente_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaPackingListCliente_filter label .input-sm{
            width: 90%;
        }
        #tablaPackingListCliente_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('#tablaPackingListCliente').DataTable( {
            "order": [[ 0, 'desc' ]],
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
        var table = $('#tablaPackingListCliente').DataTable();
        $('#tablaPackingListCliente tbody').on( 'click', 'tr', function () {
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