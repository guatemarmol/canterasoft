<?php include_once '../../../on-database.php'?>
<?php
$codigo = $_REQUEST['codigo'];
$sqlT   = "SELECT SUM(peso)
FROM filasPackingListLocal WHERE codigo='$codigo'";
$resultT = mysqli_query($con, $sqlT);
while ($verT = mysqli_fetch_row($resultT)) {
    $datosT = $verT[0] . "||" .
        $verT[1] . "||" .
        $verT[2] . "||" .
        $verT[3] . "||" .
        $verT[4] . "||" .
        $verT[5] . "||" .
        $verT[6];
    ?>
<div class="container-fluid" id="datosPL">
    <div class="row" style="margin-top: 2px;">
        <h4 style="background-color: #f4f4f4; width: 100%; padding: 3px; margin-bottom: 1px;">
            Packing-List Local
        </h4>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaL">
            <thead>
                <tr id='titulo' class='table-active'>
                    <th style="color: #fff;">No.</th>
                    <td id="M1">Código Barras</td>
                    <td id="M1">Código</td>
                    <td id="M1">Producto</td>
                    <td id="M1">Lote</td>
                    <td id="M1">Peso</td>
                </tr>
            </thead>
            <tbody>
            <?php
$codigo = $_REQUEST['codigo'];
    $sql    = "SELECT * FROM filasPackingListLocal WHERE codigo='$codigo' ORDER BY codigo DESC";
    $result = mysqli_query($con, $sql);
    while ($ver = mysqli_fetch_row($result)) {
        $datos = $ver[0] . "||" .
            $ver[1] . "||" .
            $ver[2] . "||" .
            $ver[3] . "||" .
            $ver[4] . "||" .
            $ver[5] . "||" .
            $ver[6];
        ?>
            <tr>
                <th style="font-weight: 550; text-align: center; color: #000" class="col-xs-1 col-sm-1 col-md-1 col-lg-1 espacio"></th>
                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 espacio"><a id="fila0" class="barras"><?php echo $ver[1] ?></a></td>
                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 espacio"><a id="fila0"><?php echo $ver[2] ?></a></td>
                <td><a id="fila0"><?php echo $ver[3] ?></a></td>
                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 espacio"><a id="fila0"><?php echo $ver[4] ?></a></td>
                <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1 espacio"><a id="fila0"><?php echo $ver[5] ?></a></td>
            </tr>
<?php
}
    ?>
             </tbody>
         <tfoot>
             <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right; font-weight: bold; color: #000; padding-right: 5px; font-size: 16px;">Total:</td>
                <td id="totalLP" style="color: #000000; font-size: 14px;"><?php echo $verT[0] ?></td>
            </tr>
            </tfoot>
<?php
}
?>
        </table>
    </div>
</div>
<style type="text/css">
    .barras{
        font-family: "3Of9Barcode";
        text-align: center;
        /*font-size: 20px;
        margin-top: -2px;
        margin-bottom: -1px;
        border: solid 1px transparent;
        letter-spacing: .1em;*/
    }
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
    #tablaL_filter{
        display: none;
    }
    #tablaP_filter{
        display: none;
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
        #tablaP_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaP_filter label .input-sm{
            width: 90%;
        }
        #tablaP_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
       var table =  $('#tablaL').DataTable( {

            "order": [[ 0, 'desc' ]],
            //"scrollY":        "180px",
            "scrollCollapse": false,
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
        } );

        $('#tablaL tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
         } );
            table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    } );
</script>