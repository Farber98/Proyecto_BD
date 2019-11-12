<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM sueldo WHERE idSueldo=$id";
        if($result = mysqli_query($link, $sql)){
                $data = "<hr>";
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $idAgente = $row['Agente_idAgente'];
                        $data .= "<p><strong>Periodo del sueldo: </strong>".$row['mesSueldo']. " - " . $row['anioSueldo']."</p>";
                    }
                }
            echo $data;
            mysqli_free_result($result);
        }
        
        
        $data="";
        $sql= "SELECT Agente.nombreAgente AS 'nombreAgente', Agente.CUIL AS 'CUIL',Agente.direccion AS 'direccion',Agente.apellidoAgente AS 'apellidoAgente', Agente.antiguedad AS 'antiguedad', Reparticion.nombreReparticion AS 'nombreReparticion', Reparticion.idReparticion AS 'idReparticion', 
            Puesto.numeroCategoria AS 'numeroCategoria', Puesto.fechaFin AS 'fechaFin', Puesto.nombrePuesto AS 'nombrePuesto'
            FROM Puesto
                INNER JOIN Agente_Has_Puesto ON Puesto.idCategoria=Agente_Has_Puesto.Puesto_idCategoria
                INNER JOIN Agente ON Agente_Has_Puesto.Agente_idAgente=Agente.idAgente
                INNER JOIN Reparticion ON Puesto.Reparticion_idReparticion = Reparticion.idReparticion
            WHERE Agente.idAgente=$idAgente AND Puesto.fechaFin IS NULL;";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $data = "<hr>";
                        $data .= "<h4>Datos del agente</h4>";
                        $data .= "<p><strong>Apellido y nombre: </strong>".$row['apellidoAgente']. ", " . $row['nombreAgente']."</p>";
                        $data .= "<p><strong>CUIL: </strong>".$row['CUIL']."</p>";
                        $data .= "<p><strong>Dirección: </strong>".$row['direccion']."</p>";
                        $data .= "<p><strong>Puesto y N° categoría: </strong>".$row['nombrePuesto']. " - " . $row['numeroCategoria']."</p>";
                        
                    }
                }
                mysqli_free_result($result);
                $data .= "<hr>";
                echo $data;
            }
        
        
        
        
        
        
        
        
        $sql = "SELECT * FROM detalle WHERE Sueldo_idSueldo = $id;";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $data= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>#</th>";
                            $data .= "<th>Descripción</th>";
                            $data .= "<th>Monto</th>";
                            $data .= "<th>#Sueldo</th>";
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                $total=0; $pos=0;$neg=0;
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['idDetalle'] . "</td>";
                            $data .= "<td>" . $row['descripcionDetalle'] . "</td>";
                            $data .= "<td>$" . $row['monto'] . "</td>";
                            $data .= "<td>" . $row['Sueldo_idSueldo'] . "</td>";                                                     
                            $total = $total + $row['monto'];
                            if($row['monto']>0){
                                $pos = $pos + $row['monto'];
                            }
                            else{
                                $neg = $neg + $row['monto'];
                            }
                        $data .= "</tr>";                                            
                    }  
                $data .= "</tbody>";                            
                $data .= "</table>";
                $data .= "</div>";                
                $data .= "<h4 style='padding-left: 330px;'>Haber: $".$pos."</h4>";
                $data .= "<h4 style='padding-left: 335px;'>Debe: $".$neg."</h4>";
                $data .= "<hr>";
                $data .= "<h4 style='padding-left: 215px;'>Sueldo total neto: $".$total."</h4>";
                // Free result set
                mysqli_free_result($result);
            } else{
                $data = "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias</em></p></div>";
            }

            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // Close connection
        mysqli_close($link);
    }
?>