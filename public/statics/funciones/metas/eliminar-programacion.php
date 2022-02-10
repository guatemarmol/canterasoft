<?php
    include_once '../../on-database.php';

    $logic = $_POST['logic'];
    $actividad = $_POST['actividad']; 
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
   
    $query = "CALL deleteActividad($logic,'$actividad','$fechaInicio','$fechaFin');";

    $result = mysqli_query($con, $query);
    if($result){
            echo "<center><strong><h4>¡El dato se ha Eliminado con éxito!<BR></strong></h4></center>";
      
    }
    else{
        echo "<center><strong><h4>¡Error en el servidor, contacte al administrador!<BR></strong></h4></center>";
    }

/*
SELECT id  FROM tipoactividad WHERE nombreactividad = "Prueba 2";
SELECT id FROM actividad WHERE actividad = 4 AND fechainicio = "2021-03-17" AND fechafin = "2021-03-17";
DELETE FROM actividad_dia WHERE actividad = 4;
DELETE FROM actividad WHERE id = 4;
DELETE FROM tipoactividad WHERE id = 4;

DELETE FROM actividad;
DELETE FROM actividad_dia;
DELETE FROM tipoactividad;
ALTER TABLE actividad_dia AUTO_INCREMENT = 1;
ALTER TABLE actividad AUTO_INCREMENT = 1;
ALTER TABLE tipoactividad AUTO_INCREMENT = 1;


ALTER TABLE actividad ADD FOREIGN KEY (actividad) REFERENCES tipoactividad(id) ON DELETE CASCADE;
ALTER TABLE actividad_dia ADD FOREIGN KEY (actividad) REFERENCES actividad(id) ON DELETE CASCADE;
ALTER TABLE actividad ADD FOREIGN KEY (actividad) REFERENCES tipoactividad(id) ON UPDATE CASCADE;
ALTER TABLE actividad_dia ADD FOREIGN KEY (actividad) REFERENCES actividad(id) ON UPDATE CASCADE;


CALL `deleteActividad`(
 1,
 "Prueba 1",
 "2021-03-15",
 "2021-03-16")
*/





?>


