<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigo = $_POST['codigo'];    
    $consulta = "SELECT * FROM categoriasuministros WHERE codigo='$codigo'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $nombre = $_POST['nombre'];
       
         
         $actualizar ="UPDATE categoriasuministros SET categoria='$nombre' WHERE codigo='$codigo'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

       
        $nombre = $_POST['nombre'];
       
        $agregar ="INSERT INTO categoriasuministros(categoria)
                            VALUES ('$nombre')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>