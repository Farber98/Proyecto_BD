<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["id"])&&isset($_POST["selectorFecha"])&&isset($_POST["cantidadHoras"])){
        $fecha = date('Y-m-d',strtotime($_POST["selectorFecha"]));
        $horas = $_POST["cantidadHoras"];
        $id = $_POST["id"];
        $sql = "INSERT INTO horaextra (fechaHoraExtra, cantidadHoraExtra, Agente_idAgente) 
                VALUES('$fecha', $horas, $id);";
        if (!$result = mysqli_query($link, $sql)) {
               header("Location: ../horasExtra.php?msg=error&date=$fecha&cant=$horas&id=$id");
        }
        else{
            header("Location: ../horasExtra.php?msg=success&date=$fecha&cant=$horas&id=$id");        
        }

    }    
    // Close connection
    mysqli_close($link);
?>