<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["id"])&&isset($_POST["selectorFecha"])){
        $anio = date('Y',strtotime($_POST["selectorFecha"]));
        $fecha = date('Y-m-d',strtotime($_POST["selectorFecha"]));
        $id = $_POST["id"];
        $sql = "INSERT INTO licencia (fechaInicioLicencia, Agente_idAgente, TipoLicencia_codigoTipoLicencia) 
                VALUES('$fecha',$id, 1);";
        if($anio!='1970'){
            if (!$result = mysqli_query($link, $sql)) {
                header("Location: ../falta.php?msg=error2&date=$fecha&id=$id");
            }
            else{
                header("Location: ../falta.php?msg=success&date=$fecha&id=$id");
            }
        }
        else{
            header("Location: ../falta.php?msg=error&date=$fecha&id=$id");
        }
    }
    
    // Close connection
    mysqli_close($link);
?>