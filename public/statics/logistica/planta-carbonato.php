<?php include_once '../on-database.php' ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Planta Carbonato | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
    <?php include_once '../partials/funciones-css.php' ?>
    <?php include_once '../partials/menu.html' ?>
<body onload="relojCalendario()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="padding-right: 1px; padding-left: 1px;">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-right: 1px; padding-left: 1px;">
                <form name="form" class="form" id="form" method="POST" action="">
                    <?php include_once 'planta-carbonato.html' ?>
                </form>

                
            </div>
        </div>
    </div>


    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/logistica/planta-carbonato.js"></script>
    <?php include_once '../partials/funciones-js.php' ?>
</body>
<footer>
    <?php require_once '../partials/footer.html' ?>
</footer>

<style type="text/css">
    .button{
        margin-bottom:2px;
    }
    .has-error {
        border-color: darkred;
        border-left: solid 3px;
        border-left-color: darkred;
    }
    .has-succes {
        border-color: #cccccc;
        border-left: solid 1px;
        border-color: black;
    }
    .eModal{
        font-weight: 600;
        font-size: 12px;
    }
/*El nombre de nuestra clase de table es list, Extendemos las propiedades de la clase table de Bootstrap*/
    .list{
   @extend .table;
   margin-top: 10px;
   width: 100%;
}

/*Colocamos bordes a nuestra tabla*/
.list td, .list th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
     color: black;
     
}

/*Colocamos color a los hijos pares de la tabla y al encabezado*/

.list tr:nth-child(even), .list thead>tr {
    background-color: #dddddd;
}

/*CAMBIAMOS EL CURSOS A NUESTRAS CELDAS ELIMINAR Y MODIFICAR CREADAS DINAMICAMENTE*/
.modificarcelda, .eliminarcelda{
    cursor: pointer;
}


/*CAMBIAMOS EL COLOR A LOS ICONOS A NUESTRAS CELDAS ELIMINAR Y MODIFICAR CREADAS DINAMICAMENTE*/
.modificarcelda:hover{
    color: blue;
}
.eliminarcelda:hover{
    color: red;
}

/*vamos a hacer un quiebre justo en 992 para posicionar los divs a la derecha para pantalla grande*/
@media (min-width: 768px) and (max-width: 992px){ 
    .centrar {  /*Esta clase es para centrar los divs de Producto a la izquierda*/
    position: absolute;
    top: 20px;
    left: 400px;
  }  
    .tablet{ /*Esta clase esconden los nombres tipo label*/
        display: none;
    }
    .pegartablet{ /*Esta clase va a correr el titulo a la izquierda*/
        position: relative;
        margin-left: -200px;
    }
}
/*aqui vamos a hacer lo mismo pero con min width para crear un rango*/



/*///////////////////////////////////////////////////////////////////////////////////////////////*/

/*vamos a hacer un quiebre justo en 992 para posicionar los divs a la derecha para pantalla grande*/
@media (min-width: 992px) { 
    .centrar {
    position: absolute;
    top: 20px;
    left: 496px;
  } 
   }

/*vamos a hacer un quiebre justo en 1200 para posicionar los divs a la derecha para pantalla extra grande*/
@media (min-width: 1200px) { 
    .centrar {
    position: absolute;
    top: 20px;
    left: 600px;
  } 
}


@media (min-width: 1500px) { 
     .centrar {
    position: absolute;
    top: 20px;
    left: 700px;
  } 

}


/*vamos a hacer un quiebre justo en 1500 para posicionar los divs a la derecha para pantalla extra grande*/

@media (min-width: 1750px) { 
    .centrar {
    position: absolute;
    top: 20px;
    left: 800px;
  } 

}
</style>