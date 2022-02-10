
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio buscarExcel">
     <div class="formulario">
        <form action="cuentasXpagar.php" class="formulariocompleto form" method="post" enctype="multipart/form-data">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 espacio">
                <input type="file" name="archivo" class="file form-control"/>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 espacio">
                <button class="button" type="submit" name="enviarPP" onclick="ShowLoading()">
                    <span class="glyphicon glyphicon-cloud-upload">
                    </span>
                    Subir Archivo PP
                </button>
            </div>
        </form>
     </div>
</div>
<?php
if (isset($_POST["enviarPP"])) {
    //nos permite recepcionar una variable que si exista y que no sea null
    require_once "conexion.php";
    require_once "functions.php";

    $archivo          = $_FILES["archivo"]["name"];
    $archivo_copiado  = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "copia_PP_" . $archivo;

    //echo $archivo . "esta en la ruta temporal: " . $archivo_copiado;

    if (copy($archivo_copiado, $archivo_guardado)) {

        echo "<h4 class='avisoPP'>Se copio Cuentas por Pagar PP a nuestra carpeta de Trabajo.</h4><br/>";
    } else {
        echo "<h4 class='avisoPP'>Hubo un error, No se Copio Cuentas por Pagar PP.</h4> <br/>";
    }

    if (file_exists($archivo_guardado)) {

        $fp   = fopen($archivo_guardado, "r"); //abrir un archivo
        $rows = 0;
        while ($datos = fgetcsv($fp, 2000, ";")) {
            $rows++;
            //echo $datos[0] . " " . $datos[1] . " " . $datos[2] . " " . $datos[3] . " " . $datos[4] . " " . $datos[5] . " " . $datos[6] . " " . $datos[7] . "<br/>";

            if ($rows > 0) {
                $resultado = insertar_datos($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8]);
                if ($resultado) {
                    //echo "se inserto los datos correctamnete<br/>";
                } else {
                    echo "<h4 class='avisoPP'>No se inserto, Verifica.</h4> <br/>";
                }
            }
        }

    } else {
        echo "<h4 class='aviso1PP'>No existe o no se a Seleccionado el archivo que se intenta Subir.";
    }
}
?>
<style type="text/css">
    .avisoPP{
        text-align: center;
        background-color: #f5f5f5;
        padding: 10px;
        color: #000000;
        margin-top: 55px;
        margin-bottom: -15px;
    }
    .aviso1PP{
        text-align: center;
        background-color: #ebebeb;
        padding: 10px;
        color: #000000;
        margin-top: -2px;
    }
    .buscarExcel{
        margin-bottom: 20px;
        margin-top: 10px;
    }
    input[type="file"]{
        font-size: 12.5px;
        color: #000;
        outline: none;
        background: #f5f5f5;
        border-radius: 4px;
        box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
        padding: 6px;
    }
    .button{
        height: 35px;
        font-size: 15px;
        color: rgb(255, 255, 255);
        background-color: #515151;
        border: none;
        letter-spacing: .1em;
        border-radius: 2px;
    }
    .button:hover {
        background: #2d2d30;
        color: rgb(255, 255, 255);
    }
    .form input[type="file"]:hover, .form input[type="file"]:active, .form input[type="file"]:focus{
        outline: none;
        border: 1px solid #000000;
        box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
    }
    @media (max-width: 767px){
        .file{
            margin-bottom: 5px;
        }
    }
</style>
