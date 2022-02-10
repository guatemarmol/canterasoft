<?php include_once '../../../on-database.php' ?>

<div class="container-fluid" style="width:99%">
    <div class="row">
        <h3 class="nombre-tabla ocultar"> Planta de Corte y Pulido Marfisa</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaPlantaMarfisa">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">Código</td>
                    <td id="M1">Fecha</td>
                    <td id="M2">Usuario</td>
                    <td id="M5">Status</td>
                    <td id="M6">Solicitante</td>
                    <td id="M7">Encargado</td>
                    <td id="M8">Autorización</td>
                    <td id="M9">Nota</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM ordenPedido WHERE bodega = 6 ORDER BY codigo DESC;";
            $result = mysqli_query($con, $sql);
            $url = '';
            if(isset($_GET['estado'])){
                $url = '../compras/orden-compra.php?area=6&estado=cotizado&codigo=';
            }else{
                $url = '../compras/cotizacion.php?area=6&codigo=';
            }
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
            ?>
                    <tr>
                        <td><a id="fila0" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[1] ?></a></td>
                        <td><a id="fila1" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[2] ?></a></td>
                        <td><a id="fila2" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[3] ?></a></td>
                        <td><a id="fila4" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[5] ?></a></td>
                        <td><a id="fila5" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[6] ?></a></td>
                        <td><a id="fila6" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[7] ?></a></td>
                        <td><a id="fila7" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[8] ?></a></td>
                        <td><a id="fila8" href='<?php echo $url.$ver[1] ?>'><?php echo $ver[9] ?></a></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<style >
    html {
  scroll-behavior: smooth;
}
</style>
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
        margin-right: 25px;
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
        #tablaPlantaMarfisa_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaPlantaMarfisa_filter label .input-sm{
            width: 90%;
        }
        #tablaPlantaMarfisa_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('#tablaPlantaMarfisa').DataTable( {
            "order": [[ 0, 'desc' ]],
            "scrollY":        "300px",
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
        var table = $('#tablaPlantaMarfisa').DataTable();
       
        $('#tablaPlantaMarfisa tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });
</script>