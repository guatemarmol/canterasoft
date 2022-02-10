<!----------------------------TABLA DEL HOME------------------------------->
<!------------------------------------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar">Suministros Registrados</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaSuministros">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Código</td>
                    <td id="M1">Bodega</td>
                    <td id="M2">Producto</td>
                    <td id="M3">Ubicación</td>
                    <td id="M4">Saldo Inicial</td>
                    <td id="M5">Saldo Actual</td>
                    <td id="M6">Mínimo</td>
                    <td id="M7">Máximo</td>
                    <td id="M8">Última Modificación</td>
                </t3>
            </thead>
            <tbody>
<?php
$sql    = "SELECT I.codigo, B.bodega, P.descripcion, A.area, I.saldoInicial, I.saldoActual, I.valorMinimo, I.valorMaximo, I.fechaUpdate
            FROM inventario AS I
            INNER JOIN bodegas AS B ON I.bodega = B.codigo
            INNER JOIN producto AS P ON I.producto = P.codigo
            INNER JOIN `area` AS A ON I.ubicacion = A.codigo;";
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
        $ver[8];
    ?>
    <tr onclick="llenarFormulario(this)">
        <td><a id="filaCodigo"><?php echo $ver[0] ?></a></td>
        <td><a id="filaBodega"><?php echo $ver[1] ?></a></td>
        <td><a id="filaDescripcion"><?php echo $ver[2] ?></a></td>
        <td><a id="filaNombre"><?php echo $ver[3] ?></a></td>
        <td><a id="filaInicial"><?php echo $ver[4] ?></a></td>
        <td><a id="filaActual"><?php echo $ver[5] ?></a></td>
        <td><a id="filaMinimo"><?php echo $ver[6] ?></a></td>
        <td><a id="filaMaximo"><?php echo $ver[7] ?></a></td>
        <td><a id="filaFecha"><?php echo $ver[8] ?></a></td>
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
        #tablaSuministros_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaSuministros_filter label .input-sm{
            width: 90%;
        }
        #tablaSuministros_filter{
            margin-top: 10px;
        }
    }
</style>
<!--------------------------------DATATABLE-------------------------------->
<!------------------------------------------------------------------------->
<script>
    $(document).ready(function() {
        $('#tablaSuministros').DataTable( {
            "order": [[ 0, 'desc' ]],
            "scrollY":        "180px",
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
        var table = $('#tablaSuministros').DataTable();
        $('#tablaSuministros tbody').on( 'click', 'tr', function () {
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