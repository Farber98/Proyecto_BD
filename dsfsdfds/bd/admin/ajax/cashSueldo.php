<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["id"])&&isset($_POST["mesSueldo"])&&isset($_POST["anioSueldo"])){
        $bandera=0;
        $id=$_POST["id"];
        $mesSueldo=$_POST["mesSueldo"];
        $anioSueldo=$_POST["anioSueldo"];
        $sql = "INSERT INTO sueldo (mesSueldo, anioSueldo, agente_idAgente) 
                VALUES($mesSueldo,$anioSueldo,$id);";
        if (!$result = mysqli_query($link, $sql)) {
               die(mysqli_error($link) ." ".$sql);
               header("Location: ../liquidarSueldo.php?id=$id&msg=error1");
        }
        else{
            $idSueldo = mysqli_insert_id($link);
            $sql= "SELECT Agente.nombreAgente AS 'nombreAgente', Agente.apellidoAgente AS 'apellidoAgente', Agente.antiguedad AS 'antiguedad', Reparticion.nombreReparticion AS 'nombreReparticion', Reparticion.idReparticion AS 'idReparticion', 
            Puesto.numeroCategoria AS 'numeroCategoria', Puesto.fechaFin AS 'fechaFin', Puesto.nombrePuesto AS 'nombrePuesto'
            FROM Puesto
                INNER JOIN Agente_Has_Puesto ON Puesto.idCategoria=Agente_Has_Puesto.Puesto_idCategoria
                INNER JOIN Agente ON Agente_Has_Puesto.Agente_idAgente=Agente.idAgente
                INNER JOIN Reparticion ON Puesto.Reparticion_idReparticion = Reparticion.idReparticion
            WHERE Agente.idAgente=$id AND Puesto.fechaFin IS NULL;";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $numeroCategoria = $row['numeroCategoria'];
                        $nombrePuesto = $row['nombrePuesto'];
                        $antiguedad = $row['antiguedad'];
                    }
                }
                mysqli_free_result($result);
                $descripcion = $nombrePuesto . "(Categoria: ".$numeroCategoria.")";
                $montoBasico = 20000 + 500* $numeroCategoria;
                $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                VALUES($montoBasico,'$descripcion',$idSueldo);";
                if (!$result = mysqli_query($link, $sql)) {
                    header("Location: ../liquidarSueldo.php?id=$id&msg=error2");
                }
                $descripcion = "Antiguedad: ".round($antiguedad/365)." anios";
                $montoAntiguedad = 0.03*round($antiguedad/365)*$montoBasico;
                $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                VALUES($montoAntiguedad,'$descripcion',$idSueldo);";
                if (!$result = mysqli_query($link, $sql)) {
                    header("Location: ../liquidarSueldo.php?id=$id&msg=error3");
                }
                //sumamos lo del titulo
                $sql = "SELECT tipoEstudioAgente FROM estudioAgente WHERE Agente_idAgente = $id;";
                if($result = mysqli_query($link, $sql)){
                    $bandera=0;
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $tipoEstudio = $row['tipoEstudioAgente'];
                        } 
                        $bandera=1;
                        switch ($tipoEstudio) {
                            case "universitario":
                                $montoEstudio = 0.03 * $montoBasico;
                                break;
                            case "posgrado":
                                $montoEstudio = 0.04 * $montoBasico;
                                break;
                            case "terciario":
                                $montoEstudio = 0.01 * $montoBasico;
                                break;
                            case "doctorado":
                                $montoEstudio = 0.05 * $montoBasico;
                                break;
                        }
                        
                    }
                    mysqli_free_result($result);
                    if($bandera==1){
                        $descripcion = "Bonus estudio: ".$tipoEstudio;                    
                        $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                        VALUES($montoEstudio,'$descripcion',$idSueldo);";
                        if (!$result = mysqli_query($link, $sql)) {
                            header("Location: ../liquidarSueldo.php?id=$id&msg=error4");
                        }
                        $bandera=0;
                    }
                    //aca va lo sig
                    $sql = "SELECT * FROM conyuge WHERE Agente_idAgente = $id AND fechaFin IS NULL;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $bandera=1;
                        }
                        mysqli_free_result($result);
                        if($bandera==1){
                            $descripcion = "Bonus conyuge";  
                            $montoConyuge = 0.01*$montoBasico;
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoConyuge,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error5");
                            }
                            $bandera=0;
                                
                        }
                    }
                    //aca va lo sig
                    $sql = "SELECT EstudioHijo.tipoEstudioHijo AS 'tipoEstudioHijo' 
                            FROM Agente_has_hijo 
                                INNER JOIN hijo ON Agente_has_hijo.Hijo_idHijo = Hijo.idHijo
                                INNER JOIN estudioHijo ON hijo.idHijo = estudioHijo.hijo_idHijo
                            WHERE Agente_has_hijo.Agente_idAgente = $id;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $montoHijos =0;
                            $bandera=1;
                            while($row = mysqli_fetch_array($result)){
                                switch ($tipoEstudio) {
                                    case "universitario":
                                        $montoHijos = $montoHijos + 1000;
                                        break;
                                    case "terciario":
                                        $montoHijos = $montoHijos + 700;
                                        break;
                                    case "secundario":
                                        $montoHijos = $montoHijos + 500;
                                        break;
                                    case "primario":
                                        $montoHijos = $montoHijos + 300;
                                        break;
                                }
                            } 
                        }
                        mysqli_free_result($result);
                        if($bandera==1){
                            $descripcion = "Bonus estudios hijos";  
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoHijos,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error6");
                            }
                            $bandera=0;                                
                        }
                    }
                    //aca va lo sig
                    $descripcion = "Aporte voluntario IPSST";
                    $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                    VALUES(-800,'$descripcion',$idSueldo);";
                    if (!$result = mysqli_query($link, $sql)) {
                        header("Location: ../liquidarSueldo.php?id=$id&msg=error7");
                    }
                    //aca va lo sig
                    $descripcion = "Aporte previsional";
                    $montoJubilacion = -0.03*$montoBasico;
                    $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                    VALUES($montoJubilacion,'$descripcion',$idSueldo);";
                    if (!$result = mysqli_query($link, $sql)) {
                        header("Location: ../liquidarSueldo.php?id=$id&msg=error8");
                    }
                   //-----
                    $sql = "SELECT * FROM horaextra 
                            WHERE Agente_idAgente = $id;";
                    if($result = mysqli_query($link, $sql)){                        
                        if(mysqli_num_rows($result) > 0){
                            $cantHorasExtras=0;
                            while($row = mysqli_fetch_array($result)){
                                $fechaHoraExtra = $row['fechaHoraExtra'];
                                $month = date("m",strtotime($fechaHoraExtra));                                
                                if((int)$month==$mesSueldo){
                                    $bandera=1;
                                    $cantHorasExtras=$cantHorasExtras + $row['cantidadHoraExtra'];                                    
                                }
                            } 
                        }
                        mysqli_free_result($result);
                        if($bandera==1){
                            $descripcion = "Horas extra (".$cantHorasExtras.")"; 
                            $montoHorasExtra = ($montoBasico/160)*$cantHorasExtras*1.5;
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoHorasExtra,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error10");
                            }
                            $bandera=0;                                
                        }
                    }
                    //aca va lo de las faltas
                    $sql = "SELECT * FROM licencia   
                            WHERE Agente_idAgente = $id AND TipoLicencia_codigoTipoLicencia=1;";
                    if($result = mysqli_query($link, $sql)){                        
                        if(mysqli_num_rows($result) > 0){
                            $cantFaltas=0;
                            while($row = mysqli_fetch_array($result)){
                                
                                $fechaFalta = $row['fechaInicioLicencia'];
                                $month = date("m",strtotime($fechaFalta));                                
                                if((int)$month==$mesSueldo){                                    
                                    $bandera=1;
                                    $cantFaltas = $cantFaltas+1;                                  
                                }
                            } 
                        }
                        mysqli_free_result($result);
                        if($bandera==1){
                            $descripcion = "Descuentos por faltas (".$cantFaltas.")"; 
                            $montoFaltas = -1*($montoBasico/22)*$cantFaltas;
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoFaltas,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error11");
                            }
                            $bandera=0;                           
                        }
                    }                                        
                    //aca va el sig
                    //aca va lo de las llegadas tarde
                    $sql = "SELECT * FROM impuntualidad   
                            WHERE Agente_idAgente = $id;";
                    if($result = mysqli_query($link, $sql)){                        
                        if(mysqli_num_rows($result) > 0){
                            $cantMenos30=0;
                            $cantMas30=0;
                            while($row = mysqli_fetch_array($result)){
                                
                                $fechaFalta = $row['fechaImpuntualidad'];
                                $month = date("m",strtotime($fechaFalta));                                
                                if((int)$month==$mesSueldo){                                    
                                    $bandera=1;
                                    if($row['tipoImpuntualidad']=='Menos30'){
                                        $cantMenos30=$cantMenos30+1;
                                    }else{
                                        $cantMas30=$cantMas30+1;
                                    }                                  
                                }
                            } 
                        }
                        mysqli_free_result($result);
                        if($bandera==1){
                            $descripcion = "Descuentos por impuntualidad (".($cantMenos30+$cantMas30).")"; 
                            $montoImpuntualidad = -1*($montoBasico/22)*($cantMas30+intdiv($cantMenos30,2));
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoImpuntualidad,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error12");
                            }
                            $bandera=0;                           
                        }
                        $montoPresentismo = 0;
                        if($cantMas30==0){
                            $descripcion = "Bonus por presentismo"; 
                            $montoPresentismo = 0.03*$montoBasico;
                            $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                            VALUES($montoPresentismo,'$descripcion',$idSueldo);";
                            if (!$result = mysqli_query($link, $sql)) {
                                header("Location: ../liquidarSueldo.php?id=$id&msg=error12");
                            }
                            $bandera=0;                           
                        }
                    }                                        
                    //aca va el sig
                     //
                    //aca va lo sig
                    $montoTotal = $montoBasico + $montoAntiguedad + $montoEstudio + $montoConyuge + $montoHijos -800 + $montoJubilacion + $montoHorasExtra + $montoFaltas + $montoImpuntualidad + $montoPresentismo;
                    if($montoTotal>=30000){
                        $descripcion = "Impuesto a las ganacias";
                        $ganancias = -0.15*$montoTotal;
                        $sql = "INSERT INTO detalle (monto, descripcionDetalle, sueldo_idSueldo) 
                        VALUES($ganancias,'$descripcion',$idSueldo);";
                        if (!$result = mysqli_query($link, $sql)) {
                            header("Location: ../liquidarSueldo.php?id=$id&msg=error9");
                        }
                    //
                    }
                    //
                    //aca va lo sig
                    header("Location: ../liquidacionSueldos.php?&msg=success");
                }
            }
            
        }
        
    }
    
    // Close connection
    mysqli_close($link);
?>