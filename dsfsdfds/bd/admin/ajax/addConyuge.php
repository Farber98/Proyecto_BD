<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["apellidoConyuge"])&&isset($_POST["nombreConyuge"])&&isset($_POST["dniConyuge"])&&isset($_POST["fechaInicio"])&&isset($_POST["id"])){
        $apellido = $_POST["apellidoConyuge"];        
        $nombre = $_POST["nombreConyuge"];        
        $dni = $_POST["dniConyuge"];                      
        $fechaInicio = date('Y-m-d',strtotime($_POST["fechaInicio"]));
        $id = $_POST["id"];
        
        if(isset($_POST["fechaFin"])){
            $fechaFin = date('Y-m-d',strtotime($_POST["fechaFin"]));
            $sql = "INSERT INTO conyuge (DNI, nombreConyuge, apellidoConyuge, Agente_idAgente, fechaInicio, fechaFin) 
                VALUES($dni, '$nombre', '$apellido', $id, '$fechaInicio','$fechaFin');";
        }
        else{
            $sql = "INSERT INTO conyuge (DNI, nombreConyuge, apellidoConyuge, Agente_idAgente, fechaInicio) 
                VALUES($dni, '$nombre', '$apellido', $id, '$fechaInicio');";
        }
           
        if (!$result = mysqli_query($link, $sql)){
               header("Location: ../agregarConyuge.php?msg=error1&id=$id");
        }
        else{
                header("Location: ../agregarConyuge.php?msg=success&id=$id");
        }
           
    }
    
    // Close connection
    mysqli_close($link);
?>