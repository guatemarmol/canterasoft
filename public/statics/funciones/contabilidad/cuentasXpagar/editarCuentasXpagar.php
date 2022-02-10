<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$consultaEditar = "SELECT COUNT(codigo) codigo FROM cuentasXpagarSAP WHERE codigo='$codigo1'";
$ejecutarEditar = mysqli_query($con, $consultaEditar);

$tablaEditar  = mysqli_fetch_array($ejecutarEditar);
$codigoEditar = $tablaEditar['codigo'];
?>
    <div class="row">
        <h3 class="nombre-tabla ocultar" id="nombre-tabla"><?php echo $codigoEditar ?> Filas del Código <?php echo $codigo1 ?></h3>
        <form class="form" name="form" id="formED">
        <table class="display nowrap table-bordered table-hover" style="width:100%"  id="tabla-ed">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Código</td>
                    <td id="M0">Tipo</td>
                    <td id="M0">Contabilización</td>
                    <td id="M0">Vencimiento</td>
                    <td id="M0">Factura</td>
                    <td id="M0">Total</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </thead>
            <tbody>
            <?php
$sql    = "SELECT codigo, tipo, fContabilizacion, fVencimiento, nReferencia, TRUNCATE(saldoVencido, 2) FROM cuentasXpagarSAP WHERE codigo='$codigo1' ORDER BY fVencimiento ASC";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {
    $datos = $ver[0] . "||" .
        $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3] . "||" .
        $ver[4] . "||" .
        $ver[5];

    if ($ver[5] < 0) {
        $ver[5] = $ver[5] * -1;
    }
    ?>
            <tr>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaEDN" class="form-control" value="<?php echo $ver[0] ?>"></td>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaEDN" class="form-control" value="<?php echo $ver[1] ?>"></td>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaEDN" class="form-control" value="<?php echo $ver[2] ?>"></td>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaEDN" class="form-control" value="<?php echo $ver[3] ?>"></td>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaEDN" class="form-control" value="<?php echo $ver[4] ?>"></td>
                <td><input readonly="on" type="text" onclick="ped('<?php echo $datos ?>')" id="filaED" class="form-control" value="<?php echo number_format($ver[5], 2, '.', ',') ?>"></td>
                <td><input id="radio" type="radio" name="radio" onclick="ped('<?php echo $datos ?>')"></td>
            </tr>
            <?php
}
?>
             </tbody>
             <tfoot class="ocultar">
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id="M0">Código</td>
                    <td id="M0">Tipo</td>
                    <td id="M0">Contabilización</td>
                    <td id="M0">Vencimiento</td>
                    <td id="M0">Factura</td>
                    <td id="M0">Total</td>
                    <td id="M0"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            </tfoot>
        </table>
        </form>
    </div>
<style type="text/css">
    input[type='radio']:checked:after {
        width: 14px;
        height: 14px;
        border-radius: 15px;
        top: -1px;
        left: -1px;
        position: relative;
        background-color: red;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 1px solid #270000;
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
    #filaED{
        display: block;
        padding: 0px;
        font-size: 12px;
        text-align: center;
        height: 20px;
        cursor: pointer;
        border: solid 1px transparent;
    }
    #filaEDN{
        display: block;
        padding: 0px;
        font-size: 12px;
        text-align: center;
        height: 20px;
        cursor: pointer;
        border: solid 1px transparent;
    }
    tfoot td{
        color: black;
        border: solid 1px transparent;
        font-size: 11px;
        font-weight: 650;
    }
    .selected{
        /*background-color: #f2f2f2;*/
        color: #000000;
        font-weight: 900;
    }
    .selected:hover{
        /*background-color: #f2f2f2;*/
        color: #000000;
        font-weight: 900;
    }
    @media (max-width: 774px) {
        .buttons-excel{
            float: left;
        }
    }
    @media (max-width: 600px) {
        .nombre-tabla{
            font-size: 19px;
        }
    }
    @media (max-width: 375px) {
        .buttons-excel{
            float: left;
            width: 100%;
        }
        #tabla-ed_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tabla-ed_filter label .input-sm{
            width: 90%;
        }
        #tabla-ed_filter{
            margin-top: 10px;
        }
    }
</style>
<!-------------------------TABLA-------------------------------->
<!-------------------------------------------------------------->
<script>
$(document).ready(function() {
    $('#tabla-ed').DataTable( {
        /*"columnDefs": [{
                "targets": [ 3, 4, 5, 6, 7, 9, 10, 11 ],
                "visible": false
            }],*/
        "order": [[2, 'asc']],
        "scrollY":        "190px",
        "scrollCollapse": true,
        "paging":         false,
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
    var table = $('#tabla-ed').DataTable();
    $('#tabla-ed tbody').on( 'click', 'tr', function () {
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

