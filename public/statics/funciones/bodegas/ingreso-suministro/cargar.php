<!----------------------------TABLA DEL HOME------------------------------->
<!------------------------------------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <h3 class="nombre-tabla ocultar">Datos Ingreso Suministro</h3>
        <table class="display nowrap table-bordered table-hover" style="width:100%;" id="tablaig">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0" >Código</td>
                    <td id="M0" >Bodega</td>
                    <td id="M0" >Categoria</td>
                    <td id="M0" >Descripcion</td>
                    <td id="M0" >Color</td>
                    <td id="M0" >Unidad de Medida</td>
                    <td id="M0" >Ubicacion</td>
                    <td id="M0" >Equivalente 1</td>
                    <td id="M0" >Equivalente 2</td>
                    <td id="M0" >Ultimo Ingreso</td>
                    <td id="M0" >Saldo</td>
                    <td id="M0" >Saldo Minimo</td>
                    <td id="M0" >Saldo Maximo</td>
                    <!--<td id="M0"><i class="glyphicon glyphicon-refresh"></i></td>-->
                    <td id="M0"><i class="glyphicon glyphicon-trash"></i></td>
                </tr>
            </thead>
            <tbody>
<?php
include_once '../../../on-database.php';
$sql = "SELECT a.`codigosuministro`, -- [0]
  a.`codigobodega`, -- [1]
  a.`codigocategoria`,-- [2]
  a.`descripcion`,-- [3]
  a.`color`, -- [4]
  a.`codigounidadmedida`,-- [5]
  a.`ubicacion`,-- [6]
  a.`equivalente1`,-- [7]
  a.`equivalente2`,-- [8]
  a.`fechaultimoingreso`,-- [9]
  a.`saldo`,-- [10]
  a.`valorminimo`,-- [11]
  a.`valormaximo`,-- [12]
  a.`fechacreacion`,-- [13]
  a.`horacreacion`,-- [14]
  a.`horamodificacion`,-- [15]
  a.`fechamodificacion`,-- [16]
  b.`nombre`,-- [17]
  c.`nombre`,-- [18]
  d.`nombre`  -- [19]
FROM suministrobodega AS a
INNER JOIN bodegaInventarios AS b ON a.`codigobodega` COLLATE utf8_unicode_ci = b.`codigo` COLLATE utf8_unicode_ci
INNER JOIN categoriaInventarios AS c ON a.`codigocategoria` COLLATE utf8_unicode_ci = c.`codigo` COLLATE utf8_unicode_ci
INNER JOIN unidadMedidaInventarios AS d ON a.`codigounidadmedida` COLLATE utf8_unicode_ci = d.`codigo` COLLATE utf8_unicode_ci ORDER BY a.`codigobodega` DESC;";
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
        $ver[19];
    ?>
    <tr>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[0] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[17] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[18] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[3] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[4] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[19] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[6] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[7] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[8] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[9] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[10] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[11] ?></a></td>
        <td><a id="fila0" onclick="ingreso('<?php echo $datos ?>')"><?php echo $ver[12] ?></a></td>
        <!--<td><button onclick="ModificarCelda('<?php echo $datos ?>')" type="button" class="vutton" id="button"><span class="glyphicon glyphicon-refresh"></span></button></td>-->
        <td><button onclick="preEliminarCelda(this)" type="button" class="vutton" id="button"><span class="glyphicon glyphicon-trash"></span></button></td>
        <!--<td id="fila0"><?php echo $ver[0] ?></td>
        <td id="fila0"><?php echo $ver[17] ?></td>
        <td id="fila0"><?php echo $ver[18] ?></td>
        <td id="fila0"><?php echo $ver[3] ?></td>
        <td id="fila0"><?php echo $ver[4] ?></td>
        <td id="fila0"><?php echo $ver[19] ?></td>
        <td id="fila0"><?php echo $ver[6] ?></td>
        <td id="fila0"><?php echo $ver[7] ?></td>
        <td id="fila0"><?php echo $ver[8] ?></td>
        <td id="fila0"><?php echo $ver[9] ?></td>
        <td id="fila0"><?php echo $ver[10] ?></td>
        <td id="fila0"><?php echo $ver[11] ?></td>
        <td id="fila0"><?php echo $ver[12] ?></td>
<td id="fila0"><i onclick="ModificarCelda('<?php echo $datos ?>')" class="glyphicon glyphicon-refresh modificarcelda"></i></td>
<td id="fila0"><i onclick="preEliminarCelda(this)"   class="glyphicon glyphicon-trash eliminarcelda" ></i></td>-->
    </tr>
<?php
}
?>
            </tbody>
            <tfoot class="ocultar1">
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id="M0">Código</td>
                    <td id="M0" >Bodega</td>
                    <td id="M0" >Categoria</td>
                    <td id="M0" >Descripcion</td>
                    <td id="M0" >Color</td>
                    <td id="M0" >Unidad de Medida</td>
                    <td id="M0" >Ubicacion</td>
                    <td id="M0" >Equivalente 1</td>
                    <td id="M0" >Equivalente 2</td>
                    <td id="M0" >Ultimo Ingreso</td>
                    <td id="M0" >Saldo</td>
                    <td id="M0" >Saldo Minimo</td>
                    <td id="M0" >Saldo Maximo</td>
                    <!--<td id="M0"><i class="glyphicon glyphicon-refresh"></i></td>-->
                    <td id="M0"><i class="glyphicon glyphicon-trash"></i></td>
                </tr>
            </tfoot>

        </table>
        <!------------------------------------------------------->
        <!------------------------------------------------------->
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
        #tablaig_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tablaig_filter label .input-sm{
            width: 90%;
        }
        #tablaig_filter{
            margin-top: 10px;
        }
    }
</style>
<!--------------------------------DATATABLE-------------------------------->
<!------------------------------------------------------------------------->
<script>
    $(document).ready(function() {
        $('#tablaig').DataTable( {
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
        var table = $('#tablaig').DataTable();
        $('#tablaig tbody').on( 'click', 'tr', function () {
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
