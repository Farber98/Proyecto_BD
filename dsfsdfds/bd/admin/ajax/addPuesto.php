<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

   function getWorkingDays($startDate,$endDate){
      $startDate = strtotime($startDate);
      $endDate = strtotime($endDate);

      if($startDate <= $endDate){
        $datediff = $endDate - $startDate;
        return floor($datediff / (60 * 60 * 24));
      }
      return false;
    } 

if(isset($_POST["nombrePuesto"])&&isset($_POST["numeroCategoriaPuesto"])&&isset($_POST["numeroDecretoPuesto"])&&isset($_POST["fechaDecretoPuesto"])&&isset($_POST["fechaInicio"])&&isset($_POST["id"])&&isset($_POST["tipoEmpleado"])&&isset($_POST["reparticion"])){
        $nombrePuesto = $_POST["nombrePuesto"];        
        $numeroCategoria= $_POST["numeroCategoriaPuesto"];        
        $numeroDecreto = $_POST["numeroDecretoPuesto"];                                                                               
        $fechaDecreto = date('Y-m-d',strtotime($_POST["fechaDecretoPuesto"]));
        $fechaInicio = date('Y-m-d',strtotime($_POST["fechaInicio"]));
        $id = $_POST["id"];
        $tipoEmpleado = $_POST["tipoEmpleado"];                                          
        $reparticion = $_POST["reparticion"];
        
        if(isset($_POST["fechaFin"])){
            $fechaFin = date('Y-m-d',strtotime($_POST["fechaFin"]));
            
            $intervalo = getWorkingDays($_POST["fechaInicio"],$_POST["fechaFin"]);
            
            $sql = "INSERT INTO puesto (nombrePuesto, numeroCategoria, numeroDecreto, fechaDecreto, fechaInicio, fechaFin, Tipo_Empleado_idTipo_Empleado, Reparticion_idReparticion) VALUES('$nombrePuesto', $numeroCategoria, $numeroDecreto,'$fechaDecreto','$fechaInicio', '$fechaFin', $tipoEmpleado, $reparticion);";

        }
        else{
            $fechaHoy = date('Y-m-d');
            
            $intervalo = getWorkingDays($_POST["fechaInicio"],$fechaHoy);

            $sql = "INSERT INTO puesto (nombrePuesto, numeroCategoria, numeroDecreto, fechaDecreto, fechaInicio,        Tipo_Empleado_idTipo_Empleado, Reparticion_idReparticion) 
                VALUES('$nombrePuesto', $numeroCategoria, $numeroDecreto,'$fechaDecreto','$fechaInicio', $tipoEmpleado, $reparticion);";
        }
           
        if (!$result = mysqli_query($link, $sql)){
            die(mysqli_error($link) ." ".$sql);
            header("Location: ../agregarPuesto.php?msg=error1&id=$id");
        }
        else{
            $idCategoria = mysqli_insert_id($link);
            $sql = "INSERT INTO agente_has_puesto (Agente_idAgente, Puesto_idCategoria) VALUES ($id,$idCategoria);";
            if (!$result = mysqli_query($link, $sql)){
                die(mysqli_error($link) ." ".$sql);
                header("Location: ../agregarPuesto.php?msg=error2&id=$id");
            }
            
            $sql = "SELECT antiguedad FROM agente WHERE idAgente=$id";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $antiguedadAnterior = $row['antiguedad'];
                    }
                }
                $antiguedadNueva = $intervalo + $antiguedadAnterior;
                $sql = "UPDATE agente SET antiguedad=$antiguedadNueva WHERE idAgente=$id";
                if (!$result = mysqli_query($link, $sql)){
                    die(mysqli_error($link) ." ".$sql);
                    header("Location: ../agregarPuesto.php?msg=error1&id=$id");
                }
                header("Location: ../agregarPuesto.php?msg=success&id=$id");
            }
            else{
                die(mysqli_error($link) ." ".$sql);
                header("Location: ../agregarPuesto.php?msg=error3&id=$id");
            }
            
        }
           
    }
    
    // Close connection
    mysqli_close($link);
?>