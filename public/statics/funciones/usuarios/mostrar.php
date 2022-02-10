<?php

        $busqueda = $_POST['busqueda'];
        $query = "SELECT * FROM usuario WHERE codigo LIKE '%$busquedaa%' ORDER BY codigo DESC";
        $joss=$con->query($query);

        if($joss->num_rows >=1){

            while ($fila = $joss->fetch_array(MYSQLI_ASSOC)) {
            }     
        }else{
            echo "<h3 class='busqueda'>No se a encontrado ningun registro con $busqueda</h3>" ;
        }

        $codigo = $_POST['busqueda'];
        $consulta = "SELECT * FROM usuario WHERE codigo='$codigo'";
        $ejecutar = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($ejecutar);

        $codigo = $fila['codigo'];
        $rol = $fila['rol'];
        $usuario1 = $fila['usuario'];
        $username1 = $fila['username'];
        $username0 = $fila['username0'];
        $departamento = $fila['departamento'];
        $contrasena = $fila['contrasena'];
        $ccontrasena = $fila['ccontrasena'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];

?>

<style type="text/css">

      .busqueda{
             color: darkred;
             text-align: center;
             padding: 10px;
             width: 100%;
             background-color: #f2dede;
             margin-top: 5px;
       }
    
</style>