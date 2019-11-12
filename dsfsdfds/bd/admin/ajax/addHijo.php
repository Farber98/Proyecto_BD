<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    if(isset($_POST["apellidoHijo"])&&isset($_POST["nombreHijo"])&&isset($_POST["dniHijo"])&&isset($_POST["estudio"])&&isset($_POST["id"])){
        $apellido = $_POST["apellidoHijo"];        
        $nombre = $_POST["nombreHijo"];        
        $dni = $_POST["dniHijo"];                       
        $estudio = $_POST["estudio"];        
        $id = $_POST["id"];   
        
        $sql = "INSERT INTO hijo (DNI, nombreHijo, apellidoHijo) 
                VALUES($dni, '$nombre', '$apellido');";
        if (!$result = mysqli_query($link, $sql)) {
               header("Location: ../agregarHijo.php?msg=error1&id=$id");
        }
        else{
            $sql = "SELECT idHijo FROM hijo WHERE DNI = $dni;";
            if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $idHijo = $row['idHijo'];
                        }
                    }
            }
            
            if($estudio!='otro'){                
                            $sql = "INSERT INTO estudiohijo (Hijo_idHijo, tipoEstudioHijo) 
                VALUES($idHijo,'$estudio');";
                            if (!$result = mysqli_query($link, $sql)) {
                                   header("Location: ../agregarHijo.php?msg=error2&id=$id");
                            }
                        }   
        
            $sql = "INSERT INTO agente_has_hijo (Agente_idAgente, Hijo_idHijo) 
                VALUES($id,$idHijo);";
            if (!$result = mysqli_query($link, $sql)) {
                header("Location: ../agregarHijo.php?msg=error3&id=$id");
            }
            else{
                header("Location: ../agregarHijo.php?msg=success&id=$id");
            }
        }

    }
    
    // Close connection
    mysqli_close($link);
?>