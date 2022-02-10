<!------------------------------TABLA-------------------------------->
<!------------------------------------------------------------------->
<meta charset="UTF-8"/>
<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar" style="text-align: center; font-weight: 700; margin-bottom: -31px; margin-top: 5px;">Cuentas por Pagar SAP</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tabla-t">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Codigo</td>
                    <td id="M0">Nombre de Acreedor</td>
                    <td id="M0">Descripción</td>
                    <td id="M0">Total</td>
                    <td id="M0">Corriente</td>
                    <td id="M0">01 - 30</td>
                    <td id="M0">31 - 45</td>
                    <td id="M0">46 - 60</td>
                    <td id="M0">61 - 90</td>
                    <td id="M0">91 - 120</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT
s.codigo,
s.nombreAcreedor,
s.descripcion,
s.saldoVencido,
r.corriente,
u.uno,
d.dos,
t.tres,
c.cuatro,
i.cinco
FROM cuentasXpagarSaldo s
LEFT JOIN cuentasXpagarCorriente r
ON s.codigo=r.codigo
LEFT JOIN cuentasXpagarUno u
ON s.codigo=u.codigo
LEFT JOIN cuentasXpagarDos d
ON s.codigo=d.codigo
LEFT JOIN cuentasXpagarTres t
ON s.codigo=t.codigo
LEFT JOIN cuentasXpagarCuatro c
ON s.codigo=c.codigo
LEFT JOIN cuentasXpagarCinco i
ON s.codigo=i.codigo
WHERE s.saldoVencido<>'0' AND s.saldoVencido<>''
ORDER BY s.codigo";
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
        $ver[9];

    if ($ver[3] < 0) {
        $ver[3] = $ver[3] * -1;
    }
    if ($ver[4] < 0) {
        $ver[4] = $ver[4] * -1;
    }
    if ($ver[5] < 0) {
        $ver[5] = $ver[5] * -1;
    }
    if ($ver[6] < 0) {
        $ver[6] = $ver[6] * -1;
    }
    if ($ver[7] < 0) {
        $ver[7] = $ver[7] * -1;
    }
    if ($ver[8] < 0) {
        $ver[8] = $ver[8] * -1;
    }
    if ($ver[9] < 0) {
        $ver[9] = $ver[9] * -1;
    }
    ?>
    <tr>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo $ver[0] ?></a></td>
        <td><a id="fila1" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo strtoupper($ver[1]) ?></a></td>
        <td><a id="fila1" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo strtoupper($ver[2]) ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[3], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[4], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[5], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[6], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[7], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[8], 2, '.', ',') ?></a></td>
        <td><a id="fila0" href='../contabilidad/cuentasXpagar.php?codigo=<?php echo $ver[0] ?>' ><?php echo number_format($ver[9], 2, '.', ',') ?></a></td>
        <td><button type="button" class="vutton" id="button"><span class="glyphicon glyphicon-trash"></span></button></td>
    </tr>
<?php
}
?>
            </tbody>
            <tfoot class="ocultar">
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id="M0">Codigo</td>
                    <td id="M0">Nombre de Acreedor</td>
                    <td id="M0">Descripción</td>
                    <td id="M0">Total</td>
                    <td id="M0">Corriente</td>
                    <td id="M0">01 - 30</td>
                    <td id="M0">31 - 45</td>
                    <td id="M0">46 - 60</td>
                    <td id="M0">61 - 90</td>
                    <td id="M0">91 - 120</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
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
<!-------------------------TABLA-------------------------------->
<!-------------------------------------------------------------->
<script>
    $(document).ready(function() {
        $('#tabla-t').DataTable( {
            "order": [[ 0, 'asc' ]],
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
        var table = $('#tabla-t').DataTable();
        $('#tabla-t tbody').on( 'click', 'tr', function () {
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