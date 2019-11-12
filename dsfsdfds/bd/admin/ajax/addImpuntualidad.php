<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["id"])&&isset($_POST["selectorFecha"])&&isset($_POST["tipoRadios"])){
        $anio = date('Y',strtotime($_POST["selectorFecha"]));
        $fecha = date('Y-m-d',strtotime($_POST["selectorFecha"]));
        $tipo = $_POST["tipoRadios"];
        $id = $_POST["id"];
        $sql = "INSERT INTO impuntualidad (fechaImpuntualidad, tipoImpuntualidad, Agente_idAgente) 
                VALUES('$fecha','$tipo',$id);";
        if($anio!='1970'){
            if (!$result = mysqli_query($link, $sql)) {
                header("Location: ../impuntualidad.php?msg=error2&date=$fecha&id=$id");
            }
            else{
                header("Location: ../impuntualidad.php?msg=success&date=$fecha&id=$id");
            }
        }
        else{
            header("Location: ../impuntualidad.php?msg=error&date=$fecha&id=$id");
        }
    }
    
    // Close connection
    mysqli_close($link);
?>