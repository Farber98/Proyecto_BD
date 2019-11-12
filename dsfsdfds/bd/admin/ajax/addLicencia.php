<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["id"])&&isset($_POST["selectorFechaInicio"])&&isset($_POST["diasLicencia"])&&isset($_POST["tipoLicencia"])){
        $fechaInicio = date('Y-m-d',strtotime($_POST["selectorFechaInicio"]));
        $diasLicencia = $_POST["diasLicencia"];
        $id = $_POST["id"];
        $codTipo = $_POST["tipoLicencia"];
        
        for($i=0;$i<$diasLicencia;$i++){
            $fechaFin = date('Y-m-d', strtotime($fechaInicio . ' + '. $i .' days'));
            $sql = "INSERT INTO licencia (fechaInicioLicencia, Agente_idAgente, TipoLicencia_codigoTipoLicencia) 
                VALUES('$fechaFin',$id, $codTipo);";  
            if (!$result = mysqli_query($link, $sql)) {
               header("Location: ../licencia.php?msg=error&date1=$fechaInicio&date2=$fechaFin&id=$id");
            }
        }        
        header("Location: ../licencia.php?msg=success&date1=$fechaInicio&date2=$fechaFin&id=$id");
    }
    
    // Close connection
    mysqli_close($link);
?>