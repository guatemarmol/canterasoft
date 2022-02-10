<meta charset="UTF-8"/>
<div class="container-fluid">
    <div class="row">
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaUsuario-t">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id='M0'>Producto</td>
                    <td id='M1'>Consumo</td>
                    <td id='M2'>Fecha</td>
                    <td id="M6"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>
            <tbody>
<?php

$sql = "SELECT id, descripcion as producto, consumo, fecha FROM historial_consumo INNER JOIN producto ON producto.codigo = historial_consumo.producto LIMIT 100";
$result = mysqli_query($con, $sql);

while ($ver = mysqli_fetch_row($result)) {
    $datos = $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3] ;
    ?>
    <tr>
        <td><a id="fila0" href='./consumo-suministro.php?codigo=<?php echo $ver[0] ?>' ><?php echo $ver[1] ?></a></td>
        <td><a id="fila0" href='./consumo-suministro.php?codigo=<?php echo $ver[0] ?>' ><?php echo $ver[2] ?></a></td>
        <td><a id="fila0" href='./consumo-suministro.php?codigo=<?php echo $ver[0] ?>' ><?php echo $ver[3] ?></a></td>
        <td><button type="button" class="vutton" id="button" onclick="deleteProduct(<?php echo $ver[0] ?>)"><span class="glyphicon glyphicon-trash"></span></button></td>
    </tr>
<?php
}
?>
            </tbody>
            <tfoot>
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id='M0'>Producto</td>
                    <td id='M1'>Consumo</td>
                    <td id='M2'>Fecha</td>
                    <td id="M6"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </tfoot>

        </table>
        <!------------------------------------------------------->
        <!------------------------------------------------------->
    </div>
</div>
<style type="text/css">
    .vutton{
        color: red;
        border-color: transparent;
        font-size: 12px;
        background-color: transparent;
    }
    .vutton:hover{
        color: darkred;
    }
    .nombre-tabla{
        background-color: #f7f7f7;
        padding: 5px;
        padding-left: 10px;
        border: solid 1px #f5f5f5;
        border-radius: 4px;
        text-align: left;
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
    #fila1{
        font-size: 11px;
        font-weight: 600;
        /*text-transform: uppercase;*/
    }
    #fila2{
        font-size: 12px;
        /*text-transform: uppercase;*/
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
    @media (max-width: 375px) {
        #tabla-t_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tabla-t_filter label .input-sm{
            width: 90%;
        }
        #tabla-t_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('#tablaUsuario-t').DataTable( {
            "order": [[ 0, 'asc' ]],
            "scrollY":        "181px",
            "scrollCollapse": true,
            "paging":         false,
            //"ordering":       false,
            "info":           false,
                dom: 'Bfrtip',
                buttons: [
                //'copyHtml5',
                //'excelHtml5',
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
        var table = $('#tablaUsuario-t').DataTable();
        $('#tablaUsuario-t tbody').on( 'click', 'tr', function () {
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