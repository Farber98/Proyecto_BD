<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution
    if(isset($_GET['id'])){
        $data = "<hr>";
        $data .= "<h4>Información personal</h4>";
        $id = $_GET['id'];
        $sql = "SELECT * FROM agente WHERE idAgente = $id;";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $data.= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>#</th>";
                            $data .= "<th>Apellido y Nombre</th>";
                            $data .= "<th>DNI</th>";
                            $data .= "<th>CUIL</th>";
                            $data .= "<th>Telefono</th>";
                            $data .= "<th>Direccion</th>";
                            $data .= "<th>Antiguedad</th>";
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['idAgente'] . "</td>";
                            $data .= "<td>" . $row['apellidoAgente']. ", " . $row['nombreAgente'] . "</td>";
                            $data .= "<td>" . $row['DNI'] . "</td>";
                            $data .= "<td>" . $row['CUIL'] . "</td>";
                            $data .= "<td>" . $row['telefono'] . "</td>";
                            $data .= "<td>" . $row['direccion'] . "</td>";                        
                            $data .= "<td>" . (round($row['antiguedad']/365)) . "</td>";                        
                        $data .= "</tr>";                                            
                    }  
                $data .= "</tbody>";                            
                $data .= "</table>";
                $data .= "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                $data = "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias</em></p></div>";
            }

            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //--------------------------------------------------------------------------------------------------------
        $sql = "SELECT * FROM estudioAgente WHERE Agente_idAgente = $id;";
        if($result = mysqli_query($link, $sql)){
            $data = "<hr>";
            $data .= "<h4>Estudio del agente: </h4>";
            if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $data .= "Nivel alcanzado: ".$row['tipoEstudioAgente'];                                        
                    }  
                // Free result set
                mysqli_free_result($result);
            } 
            else{
                $data .= "Nivel alcanzado: Otro.";
            }

            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //--------------------------------------------------------------------------------------------------------
        $sql = "SELECT * FROM seguro WHERE Agente_idAgente = $id;";
        $data = "<hr>";
        $data .= "<h4>Seguro de vida del agente: </h4>";
        if($result = mysqli_query($link, $sql)){        
            if(mysqli_num_rows($result) > 0){
                    $data.= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>Apellido y Nombre</th>";
                            $data .= "<th>DNI</th>";
                            $data .= "<th>Telefono</th>";
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['apellidoBeneficiario']. ", " . $row['nombreBeneficiario'] . "</td>";
                            $data .= "<td>" . $row['DNIBeneficiario'] . "</td>";
                            $data .= "<td>" . $row['telefonoBeneficiario'] . "</td>";                      
                        $data .= "</tr>";                                            
                    }  
                $data .= "</tbody>";                            
                $data .= "</table>";
                $data .= "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                $data .= "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias</em></p></div>";
            }
            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
     
        //--------------------------------------------------------------------------------------------------------
        $sql = "SELECT licencia.idLicencia AS 'idLicencia', licencia.fechaInicioLicencia AS 'fechaLicencia', tipoLicencia.nombreTipoLicencia AS 'nombreLicencia'
                FROM licencia INNER JOIN tipoLicencia ON licencia.tipoLicencia_codigoTipoLicencia = tipoLicencia.codigoTipoLicencia
                WHERE licencia.Agente_idAgente = $id;";
        $data = "<hr>";
        $data .= "<h4>Licencias del agente: </h4>";
        if($result = mysqli_query($link, $sql)){        
            if(mysqli_num_rows($result) > 0){
                $data.= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>#</th>";
                            $data .= "<th>Fecha</th>";
                            $data .= "<th>Tipo de licencia</th>";
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['idLicencia'] . "</td>";
                            $data .= "<td>" . $row['fechaLicencia'] . "</td>";
                            $data .= "<td>" . $row['nombreLicencia'] . "</td>";                      
                        $data .= "</tr>";                                            
                    }  
                $data .= "</tbody>";                            
                $data .= "</table>";
                $data .= "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                $data .= "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias</em></p></div>";
            }
            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //--------------------------------------------------------------------------------------------------------
        $sql = "SELECT Puesto.idCategoria AS 'idCategoria',Puesto.numeroCategoria AS 'numeroCategoria',  Puesto.fechaDecreto AS 'fechaDecreto', Puesto.numeroDecreto AS 'numeroDecreto', Puesto.nombrePuesto AS 'nombrePuesto', Puesto.fechaInicio AS 'fechaInicio',Puesto.fechaFin AS 'fechaFin', Reparticion.idReparticion AS 'idReparticion', Reparticion.nombreReparticion AS 'nombreReparticion',Tipo_Empleado.nombreTipo AS 'nombreTipo'    
                FROM Agente_has_puesto 
                    INNER JOIN puesto ON Agente_has_puesto.Puesto_idCategoria = Puesto.idCategoria
                    INNER JOIN Reparticion ON Puesto.reparticion_idReparticion = reparticion.idReparticion 
                    INNER JOIN Tipo_empleado ON Puesto.Tipo_empleado_idTipo_empleado = Tipo_empleado.idTipo_empleado
                WHERE Agente_has_puesto.Agente_idAgente = $id;";
        $data = "<hr>";
        $data .= "<h4>Puestos del agente: </h4>";
        if($result = mysqli_query($link, $sql)){        
            if(mysqli_num_rows($result) > 0){
                $data.= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>#</th>";
                            $data .= "<th>#Decreto</th>";
                            $data .= "<th>F. decreto</th>";
                            $data .= "<th>Puesto</th>";
                            $data .= "<th>#Cat.</th>";
                            $data .= "<th>F. inicio</th>";
                            $data .= "<th>F. fin</th>";
                            $data .= "<th>Estado</th>";
                            $data .= "<th>#Reparticion</th>";
                            $data .= "<th>Nombre</th>";                        
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['idCategoria'] . "</td>";
                            $data .= "<td>" . $row['numeroDecreto'] . "</td>";
                            $data .= "<td>" . $row['fechaDecreto'] . "</td>";                      
                            $data .= "<td>" . $row['nombrePuesto'] . "</td>";                      
                            $data .= "<td>" . $row['numeroCategoria'] . "</td>";                      
                            $data .= "<td>" . $row['fechaInicio'] . "</td>";                      
                            $data .= "<td>" . $row['fechaFin'] . "</td>";                      
                            $data .= "<td>" . $row['nombreTipo'] . "</td>";                      
                            $data .= "<td>" . $row['idReparticion'] . "</td>";                      
                            $data .= "<td>" . $row['nombreReparticion'] . "</td>";                      
                        $data .= "</tr>";                                            
                    }  
                $data .= "</tbody>";                            
                $data .= "</table>";
                $data .= "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                $data .= "<div class='float-center'><p class='lead'><em>No se encontraron coincidencias</em></p></div>";
            }
            echo $data;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
//--------------------------------------------------------------------------------------
    }
    // Close connection
    mysqli_close($link);
?>