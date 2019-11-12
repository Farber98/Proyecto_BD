<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["apellidoAgente"])&&isset($_POST["nombreAgente"])&&isset($_POST["dni"])&&isset($_POST["cuil"])&&isset($_POST["direccion"])&&isset($_POST["telefono"])&&isset($_POST["estudio"])&&isset($_POST["apellidoSeguro"])&&isset($_POST["nombreSeguro"])&&isset($_POST["dniSeguro"])&&isset($_POST["telefonoSeguro"])){
        $apellido = $_POST["apellidoAgente"];        
        $nombre = $_POST["nombreAgente"];        
        $dni = $_POST["dni"];        
        $cuil = $_POST["cuil"];        
        $direccion = $_POST["direccion"];        
        $telefono = $_POST["telefono"];        
        $estudio = $_POST["estudio"];        
    
        $sql = "INSERT INTO agente (CUIL, nombreAgente, apellidoAgente, DNI, direccion, telefono) 
                VALUES($cuil,'$nombre','$apellido', $dni, '$direccion', $telefono);";
        if (!$result = mysqli_query($link, $sql)) {
               header("Location: ../agregarAgente.php?msg=error1");
        }
        else{
            $sql = "SELECT idAgente FROM agente WHERE CUIL = $cuil;";
            if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['idAgente'];
                        }
                    }
            }                                                        
            if($estudio!='otro'){                
                            $sql = "INSERT INTO estudioagente (tipoEstudioAgente, Agente_idAgente) 
                VALUES('$estudio',$id);";
                            if (!$result = mysqli_query($link, $sql)) {
                                   header("Location: ../agregarAgente.php?msg=error2");
                            }
                        }   
            $apellidoSeguro = $_POST["apellidoSeguro"];        
            $nombreSeguro = $_POST["nombreSeguro"];        
            $dniSeguro = $_POST["dniSeguro"];                     
            $telefonoSeguro = $_POST["telefonoSeguro"];
            $sql = "INSERT INTO seguro (DNIBeneficiario, telefonoBeneficiario, nombreBeneficiario, apellidoBeneficiario, Agente_idAgente) 
                VALUES($dniSeguro,$telefonoSeguro,'$nombreSeguro', '$apellidoSeguro', $id);";
            if (!$result = mysqli_query($link, $sql)) {
                header("Location: ../agregarAgente.php?msg=error3");
            }
            else{
                header("Location: ../agregarAgente.php?msg=success");
            }
        }

    }
    
    // Close connection
    mysqli_close($link);
?>