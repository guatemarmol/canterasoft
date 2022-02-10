<?php include_once '../../../on-database.php'?>
    <div class="row">
        <table class="display nowrap table-bordered table-hover" style="width:100%"  id="tabla-ingreso">
            <thead>
                <tr id='titulo' class='table-active'>
                    <td id="M0">#</td>
                    <td id="M0">Descripción</td>
                    <td id="M1">Cuenta de Mayor</td>
                    <td id="M2">Nombre Cuenta de Mayor</td>
                    <td id="M3">Proyecto</td>
                    <td id="M4">IVA</td>
                    <td id="M5">Total</td>
                    <td id="M6">No. Acuerdo Legal</td>
                    <td id="M6">Total</td>
                </tr>
            </thead>
            <tbody>
    <tr>
        <td class="correlativo">1</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">2</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">3</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">4</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">5</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">6</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">7</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">8</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">9</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="correlativo">10</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
            </tbody>
            <tfoot>
                <tr id='titulo' class='table-active' style="background-color: #f0f0f0">
                    <td id="M0">#</td>
                    <td id="M0">Descripción</td>
                    <td id="M1">Cuenta de Mayor</td>
                    <td id="M2">Nombre Cuenta de Mayor</td>
                    <td id="M3">Proyecto</td>
                    <td id="M4">IVA</td>
                    <td id="M5">Total</td>
                    <td id="M6">No. Acuerdo Legal</td>
                    <td id="M6">Total</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 espacio">

    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 espacio">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 espacio ocultar">
            <input class="form-control" id="nombres0" readonly="" type="text" value="Total antes Descuento:"/>
            <a class="descripcion">
                .
            </a>
            <input class="form-control" id="nombres0" readonly="" type="text" value="Descuento %:"/>
            <a class="descripcion">
                .
            </a>
            <input class="form-control" id="nombres0" readonly="" type="text" value="Gastos Adicionales:"/>
            <a class="descripcion">
                .
            </a>
            <input class="form-control" id="nombres0" readonly="" type="text" value="Redondeo:"/>
            <a class="descripcion">
                .
            </a>
            <input class="form-control" id="nombres0" readonly="" type="text" value="Impuesto:"/>
            <a class="descripcion">
                .
            </a>
            <input class="form-control" id="nombres0" readonly="" type="text" value="Total:"/>
            <a class="descripcion">
                .
            </a>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 espacio">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Total antes Descuento" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Total antes Descuento
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Descuento %" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Descuento %
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Gastos Adicionales" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Gastos Adicionales
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Redondeo" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Redondeo
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Impuesto" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Impuesto
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
                <div class="input-group">
                    <span class="input-group-addon letraQ">
                        Q.
                    </span>
                    <input class="form-control calendario" placeholder="Total" type="text"/>
                </div>
                <a class="descripcion" id="descripcion">
                    Total
                </a>
            </div>
        </div>
    </div>


</div>
<style type="text/css">
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
    .correlativo{
        color: #000;
        font-size: 12px;
    }
    tfoot td{
        color: black;
        border: solid 1px transparent;
        font-size: 11px;
        font-weight: 700;
    }
    .selected{
        background-color: #f2f2f2;
        color: #000000;
        font-weight: 650;
    }
    .selected:hover{
        background-color: #f2f2f2;
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
        #tabla-ingreso_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tabla-ingreso_filter label .input-sm{
            width: 90%;
        }
        #tabla-ingreso_filter{
            margin-top: 10px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $('#tabla-ingreso').DataTable( {
            "order": [[ 1, 'asc' ]],
            "scrollY":        "201px",
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
        var table = $('#tabla-ingreso').DataTable();
        $('#tabla-ingreso tbody').on( 'click', 'tr', function () {
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
