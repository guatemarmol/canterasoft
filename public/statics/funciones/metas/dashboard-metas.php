<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

$date;
$end;
$mesactual;
if(htmlspecialchars($_GET["mes"])){
$date = date("Y").'-'.htmlspecialchars($_GET["mes"]).'-01';
$end = date("Y").'-'.htmlspecialchars($_GET["mes"]).'-' .date('t', strtotime($date)); //Obtener ultimo dia del mes
$mesactual = intval(htmlspecialchars($_GET["mes"]));
}else{
$date = date("Y").'-'.date('m').'-01';
$end = date("Y").'-'.date('m').'-' .date('t', strtotime($date)); //Obtener ultimo dia del 
$mesactual = intval(date('m'));
}


/*$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  if(isset($_POST)){
  echo 'b'; //Prints 'b'
}
);*/
  
 $arreglomes = array(); 
 
 $i = 0;
 $j = 0;
 
 $arreglomes[$i][$j] = "ACTIVIDADES";
 $j++; 
 $arreglomes[$i][$j] = "TIEMPO ACTIVIDAD";
 $j++;
//echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
//echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
//echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
//echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";




?>
<table>
    <tr>
    <?php 
       while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        if($day_name == 'Monday'){
        $arreglomes[0][$j] = "LU<br/> ".$day_num;
       // echo "<td> LU <br/> $day_num</td>";
        }else if($day_name == 'Tuesday'){
        $arreglomes[0][$j] = "MA<br/> ".$day_num;
      //  echo "<td> MA <br/> $day_num</td>";
        }else if($day_name == 'Wednesday'){
        $arreglomes[0][$j] = "MI<br/> ".$day_num;
       // echo "<td> MI <br/> $day_num</td>";
        }else if($day_name == 'Thursday'){
        $arreglomes[0][$j] = "JU<br/> ".$day_num;
       // echo "<td> JU <br/> $day_num</td>";
        }else if($day_name == 'Friday'){
        $arreglomes[0][$j] = "VI<br/> ".$day_num;
      //  echo "<td> VI <br/> $day_num</td>";
        }else if($day_name == 'Saturday'){
            if(htmlspecialchars($_GET["weekend"])){
                if(htmlspecialchars($_GET["weekend"]) == "si"){
              //   echo "<td> SA <br/> $day_num</td>";    
                 $arreglomes[0][$j] = "SA<br/> ".$day_num;
                }else{
                 
                      }
                }else{
                 $arreglomes[0][$j] = " ";    
                     }
        }else if($day_name == 'Sunday'){
        if(htmlspecialchars($_GET["weekend"])){
                if(htmlspecialchars($_GET["weekend"]) == "si"){
                // echo "<td> DO <br/> $day_num</td>";    
                 $arreglomes[0][$j] = "DO<br/> ".$day_num;
                }else{
               
                      }
                }else{
               
                     }
        }
        $j++;
    }
     $columnastotal = $j;
    ?>
    </tr>
</table>

<?php include_once '../../on-database.php' ?>

<?php
    

    $sql = "SELECT 
  a.`id`,
  a.`duracion`,
  b.`nombreactividad`
FROM
  `actividad` a INNER JOIN tipoactividad b ON a.`actividad` = b.`id`
WHERE
MONTH(fechainicio) = $mesactual
ORDER BY a.`fechainicio`,a.`fechafin` ;";
    $result = mysqli_query($con, $sql);
    $i++; // este incremento se debe a que ya estan los headers
    while($fila = mysqli_fetch_row($result)){ // Inicio busqueda de actividades
    $arreglomes[$i][0] = $fila[2];
    $arreglomes[$i][1] = $fila[1];
     $sql = "SELECT
    `duracionDia`, 
     DAY(`fechaAsignado`),
     `esSabado`,
    `colorevento` 
    FROM
   `actividad_dia` a
    INNER JOIN `actividad`  b on a.`actividad` = b.`id`
    WHERE a.`actividad` = $fila[0];";
    $result2 = mysqli_query($con, $sql);
    while($columna = mysqli_fetch_row($result2)){
    $posicion =  intval($columna[1])+1; //El corrimiento en la matriz es de + 1
    if(htmlspecialchars($_GET["weekend"])){ // Comienzo logica de Insercion
        if(htmlspecialchars($_GET["weekend"]) == "si" && $columna[2]==1){    // Si es weeknd para mostrar y si el dato en la base de datos tambien es weeknd
        $arreglomes[$i][$posicion] = "<div style='background-color: $columna[3];'>$columna[0]</div>";
        }else if(htmlspecialchars($_GET["weekend"]) == "no" && $columna[2]==0){ // si la variable no es weeknd y la variable tambien no es weeknd en la base de datos    
        $arreglomes[$i][$posicion] = "<div style='background-color: $columna[3];'>$columna[0]</div>";
        }else if(htmlspecialchars($_GET["weekend"]) == "si" && $columna[2]==0){ // si es weeknd para mostrar pero igualmente es un dia normal (0) pues procede tambien a colocarlo    
        $arreglomes[$i][$posicion] = "<div style='background-color: $columna[3];'>$columna[0]</div>";
        }
            }else{ //Si entra a este if la variable Weeknd no se activo desde JS
                if($columna[2]==0){
                $arreglomes[$i][$posicion] = "<div style='background-color: $columna[3];'>$columna[0]</div>";    
                }
                
        
            } // Fin logica de insercion
     
    } // Fin de Días de actividades
    $i++;
    } // Fin del ciclo de actividades
   
    
    $mes = date("m",strtotime($date."- 1 month" ));  //Le restamos un mes ya que en el ciclo while queda en el primer dia del mes siguiente al mostrado
    echo "<center>";
    if($mes == "01"){
     echo "<h2>ENERO</h2>";    
    }else if($mes == "02"){
     echo "<h2>FEBRERO</h2>";    
    }else if($mes == "03"){
     echo "<h2>MARZO</h2>";    
    }else if($mes == "04"){
     echo "<h2>ABRIL</h2>";    
    }else if($mes == "05"){
     echo "<h2>MAYO</h2>";    
    }else if($mes == "06"){
     echo "<h2>JUNIO</h2>";    
    }else if($mes == "07"){
     echo "<h2>JULIO</h2>";    
    }else if($mes == "08"){
     echo "<h2>AGOSTO</h2>";    
    }else if($mes == "09"){
     echo "<h2>SEPTIEMBRE</h2>";    
    }else if($mes == "10"){
     echo "<h2>OCTUBRE</h2>";    
    }else if($mes == "11"){
     echo "<h2>NOVIEMBRE</h2>";    
    }else if($mes == "12"){
     echo "<h2>DICIEMBRE</h2>";    
    } 
    echo "</center>";

    echo "<br><div style='overflow-x:auto;'><table class='display nowrap table-bordered table-hover' style='width:100%'><tr>";
    foreach ($arreglomes as $clave => $valor) {
        echo "<tr onclick='valortabla(this)'>"; // Creamos nuestra  fila
         
    for ($jj=0; $jj <= $columnastotal; $jj++) { 
        if($valor[$jj] !=null){
        echo "<td>".$valor[$jj]."</td>";   // Colocamos si hay valor
        }else{
        echo "<td> </td>"; // Cerramos si no
            
        }
                
        }         
        echo "</tr>"; // cerramos nuestro filas
    }
    
    echo "</tr></table></div>";
?>

