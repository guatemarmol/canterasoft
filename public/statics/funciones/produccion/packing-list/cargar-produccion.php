<?php
include "../../../on-database.php";
$salida    = "";
$query     = "SELECT * FROM produccion ORDER BY correlativo DESC";
$resultado = $con->query($query);
if ($resultado->num_rows > 0) {
    echo "<div class='row'>
            <div class='container-fluid'>
                <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 espacio'>
                    <input type='text' id='barrasT' value='Código Barras' readonly/>
                </div>
                <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 espacio'>
                    <input type='text' id='codigoJumboT' value='Codigo Jumbo' readonly/>
                </div>
                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 espacio'>
                    <input type='text' id='productoT' value='Producto' readonly/>
                </div>
               <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 espacio'>
                    <input type='text' id='loteT' value='Lote' readonly/>
                </div>
                <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 espacio'>
                    <input type='text' id='pesoT' value='Peso Neto' readonly/>
                </div>
            </div>
          </div>";
    while ($fila = $resultado->fetch_assoc()) {
        $correlativo = $fila['correlativo'];
        $estadoJumbo = $fila['estadoJumbo'];
        $productos   = $fila['productos'];
        $lote        = $fila['lote'];
        $peso        = $fila['peso'];
        $fecha       = $fila['fecha'];
        echo "<div class='row'>
                  <div class='container-fluid'>
                    <div class='col-xs-9 col-sm-2 col-md-2 col-lg-2 espacio'>
                        <input type='text' value='$correlativo' id='barrasTT' class='campo' readonly/>
                    </div>
                    <div class='col-xs-9 col-sm-2 col-md-2 col-lg-2 espacio'>
                        <input type='text' value='$correlativo' id='codigoJumboTT' class='campo' readonly/>
                    </div>
                    <div class='col-xs-9 col-sm-4 col-md-4 col-lg-4 espacio'>
                        <input type='text' value='$productos' id='productoTT' class='campo' readonly/>
                    </div>
                    <div class='col-xs-9 col-sm-2 col-md-2 col-lg-2 espacio'>
                        <input type='text' value='$lote' id='loteTT' class='campo' readonly/>
                    </div>
                    <div class='col-xs-9 col-sm-2 col-md-2 col-lg-2 espacio'>
                        <input type='text' value='$peso' id='pesoTT' class='campo' readonly/>
                    </div>
                  </div>
              </div>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "";
}
echo $salida;
$con->close();
?>
<style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Indie+Flower");

    @font-face {
    font-family: "3Of9Barcode";
    src: url("../../assets/fonts/3Of9Barcode.woff");
    }
  #barrasT, #codigoJumboT, #productoT, #loteT, #pesoT, #fechaT{
    background-color: #e6e6e6;
    border: solid 1px #e6e6e6;
    color: #000000;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    text-align: center;
    padding: 4px;
    cursor: pointer;
  }

  #codigoJumboTT, #productoTT, #loteTT, #pesoTT, #fechaTT{
    padding: 0px;
    display: block;
    text-align: center;
    width: 100%;
    padding: 0px;
    margin-top: 1px;
    margin-bottom: 1px
    font-size: 10px;
    border: solid 1px #e6e6e6;
    cursor: pointer;
  }
  #barrasTT{
    padding: 0px;
    display: block;
    text-align: center;
    width: 100%;
    padding: 0px;
    margin-top: 1px;
    margin-bottom: 1px
    font-size: 12px;
    font-family: "3Of9Barcode";
    border: solid 1px #e6e6e6;
    cursor: pointer;
  }
  .campo:hover{
    background-color: #e6e6e6;
    border-color: #e6e6e6;
  }
</style>
<script type="text/javascript">
    function generateBarcode(){
        var value = $("#codigoJumboTT").val();
        var btype = $("input[name=btype]:checked").val();
        var renderer = $("input[name=renderer]:checked").val();

        var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }

        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: $("#barHeight").val(),
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }

      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
</script>
