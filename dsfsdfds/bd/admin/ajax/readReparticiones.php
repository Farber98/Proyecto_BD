<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution
    /*
    $sql = "SELECT * FROM reparticion WHERE Reparticion_idReparticion IS NULL";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            $data= "<div class='table-responsive'>"; 
            $data .= "<table class='table table-bordered table-striped'>";
                $data .= "<thead>";
                    $data .= "<tr>";
                        $data .= "<th>#Reparticion</th>";
                        $data .= "<th>Nombre repartición</th>";
                        $data .= "<th>#Reparticion superior</th>";
                        $data .= "<th>Nombre repartición superior</th>";
                    $data .= "</tr>";
                $data .= "</thead>";
                $data .= "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    $data .= "<tr>";
                        $data .= "<td>" . $row['idReparticion'] . "</td>";
                        $data .= "<td>" . $row['nombreReparticion']. "</td>";
                        $data .= "<td>" . "-" . "</td>";
                        $data .= "<td>" . "-" . "</td>";
                    $data .= "</tr>";                                            
                } 
            
            //$data .= "</tbody>";                            
            //$data .= "</table>";
            //$data .= "</div>";
            
            // Free result set
            mysqli_free_result($result);
        } else{
            $data = "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias.</em></p></div>";
        }
        
        //echo $data;
    }
        */
   /* $sql = "SELECT a.idReparticion AS 'idReparticion' ,a.nombreReparticion AS 'nombreReparticion',
            b.idReparticion AS 'superReparticionId',b.nombreReparticion AS 'superReparticionNombre'
            FROM reparticion a, reparticion b
            WHERE a.Reparticion_idReparticion = b.idReparticion 
            ORDER BY a.nombreReparticion";
            */

    $sql= "SELECT Agente.telefono AS 'telefonoAgente', Agente.nombreAgente AS 'nombreAgente', Agente.apellidoAgente AS              'apellidoAgente', Reparticion.nombreReparticion AS 'nombreReparticion', Reparticion.idReparticion AS 'idReparticion', Reparticion.Reparticion_idReparticion
        FROM Puesto
            INNER JOIN Agente_Has_Puesto ON Puesto.idCategoria=Agente_Has_Puesto.Puesto_idCategoria
            INNER JOIN Agente ON Agente_Has_Puesto.Agente_idAgente=Agente.idAgente
            INNER JOIN Reparticion ON Puesto.Reparticion_idReparticion = Reparticion.idReparticion
        WHERE Puesto.nombrePuesto='Director' AND Reparticion.Reparticion_idReparticion=1;";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            
            $data= "<div class='table-responsive-sm'>"; 
            $data .= "<table class='table table-bordered table-striped'>";
                $data .= "<thead>";
                    $data .= "<tr>";
                        $data .= "<th>#Reparticion</th>";
                        $data .= "<th>Nombre repartición</th>";
                        $data .= "<th>Director</th>";
                        $data .= "<th>Teléfono director</th>";
                    $data .= "</tr>";
                $data .= "</thead>";
                $data .= "<tbody>";
                
                while($row = mysqli_fetch_array($result)){
                    $data .= "<tr>";
                        $data .= "<td>" . $row['idReparticion'] . "</td>";
                        $data .= "<td>" . $row['nombreReparticion']. "</td>";
                        $data .= "<td>" . $row['apellidoAgente'].", ".$row['nombreAgente'] . "</td>";
                        $data .= "<td>" . $row['telefonoAgente'] . "</td>";
                    $data .= "</tr>";                                            
                }  
            $data .= "</tbody>";                            
            $data .= "</table>";
            $data .= "</div>";
            // Free result set
            mysqli_free_result($result);
        } else{
            $data = "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias.</em></p></div>";
        }
        
        echo $data;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    // Close connection
    mysqli_close($link);
?>