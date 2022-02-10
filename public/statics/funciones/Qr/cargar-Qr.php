<script type="text/javascript" src="../Qr/qrcode.js"></script>
<script type="text/javascript">

  //se crea una nueva variable utilizando la libreria qrcode.js, se busca el elemento div para mostrar la imagen Qr
var qrcode = new QRCode(document.getElementById("qrcode"), {
  width : 150, //Tamaño estandar del codigo Qr
  height : 150
});

function makeCode () {
  var x = $( "#empleados option:selected" ).text();
  //Se ejecuta la funcion makeCode que realiza el codigo Qr
  qrcode.makeCode(x);
}

makeCode();

//Acciones dentro del cuadro de texto que permiten ejecutar el codigo, de esta manera el programa acciona sin crear nuevos Div, ya que las siguientes, son eventos de Jquery y afectaran en tiempo real al Div, en Blur se procedera a realizar el cambio del Qr si se desenfoca el cuadro de texto, y con keydown se reconoce si se presiono una tecla y se busca su caracter en este caso es 13, que es del enter o movimiento de carrete.



$(document).mousemove(function(event){
        makeCode();
      });


function print(){
$(".imprimirQr").printThis();
}

 $('#btn-imprimir').on("click", function () {
      $('.imprimirQr').printThis({

        loadCSS: ["../../assets/css/bootstrap-theme.css","../../assets/css/bootstrap-theme.min.css","../../assets/css/bootstrap.css","../../assets/css/bootstrap.min.css","../../assets/css/estilos.css","../../assets/css/fonts.css"]

      });
    });




</script>

<style type="text/css">

  @media print {
    .areaImpresion {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
</style>
