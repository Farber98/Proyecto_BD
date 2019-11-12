<?php
    require_once dirname(__FILE__,3) .'/config.php';


    if(isset($_GET["term"])&&($_GET["type"]=="agentes")){
        // Prepare a select statement
        
        $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
        if($stmt = mysqli_prepare($link, $sql)){            
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_term);

            // Set parameters
            $param_term = $_GET["term"] . '%';
            

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                // Check number of rows in the result set
                if(mysqli_num_rows($result) > 0){
                    $data= "<div class='table-responsive-sm'>"; 
                    $data .= "<table class='table table-bordered table-striped'>";
                        $data .= "<thead>";
                            $data .= "<tr>";
                                $data .= "<th>#</th>";
                                $data .= "<th>Apellido y Nombre</th>";
                                $data .= "<th>DNI</th>";
                                $data .= "<th>CUIL</th>";
                                $data .= "<th>Teléfono</th>";
                                $data .= "<th>Dirección</th>";
                                $data .= "<th>Acciones</th>";                    
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
                            $data .= "<td style='text-align: center;'>";
                                $data .= "<a href='./viewAgent?id=". $row['idAgente'] .".php' class='btn btn-primary' role='button'><i class='fas fa-eye'></i></a>";
                            $data .= "</td>";
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
            mysqli_stmt_close($stmt);
        }
        else{
            echo "Error en la preparacion";
        }
        // Close statement
        
    }
    else{
        if((isset($_GET["term"])&&($_GET["type"]=="impuntualidad"))){
            // Prepare a select statement        
            $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
            if($stmt = mysqli_prepare($link, $sql)){            

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_term);

                // Set parameters
                $param_term = $_GET["term"] . '%';


                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    // Check number of rows in the result set
                    if(mysqli_num_rows($result) > 0){
                        $data= "<div class='table-responsive-sm'>"; 
                        $data .= "<table class='table table-bordered table-striped'>";
                            $data .= "<thead>";
                                $data .= "<tr>";
                                    $data .= "<th>#</th>";
                                    $data .= "<th>Apellido y Nombre</th>";
                                    $data .= "<th>DNI</th>";
                                    $data .= "<th>CUIL</th>";
                                    $data .= "<th>Teléfono</th>";
                                    $data .= "<th>Dirección</th>";
                                    $data .= "<th>Acciones</th>";                    
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
                                $data .= "<td style='text-align: center;'>";
                                    $data .= "<a href='./agregarImpuntualidad?id=". $row['idAgente'] .".php' class='btn btn-warning        ' role='button'><i class='fas fa-plus-circle'></i></a>";
                                $data .= "</td>";  
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
                mysqli_stmt_close($stmt);
            }
            else{
                echo "Error en la preparacion";
            }
            // Close statement              
        }
        else{
            if((isset($_GET["term"])&&($_GET["type"]=="falta"))){
                // Prepare a select statement        
                $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
                if($stmt = mysqli_prepare($link, $sql)){            

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_term);

                    // Set parameters
                    $param_term = $_GET["term"] . '%';


                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        $result = mysqli_stmt_get_result($stmt);
                        // Check number of rows in the result set
                        if(mysqli_num_rows($result) > 0){
                            $data= "<div class='table-responsive-sm'>"; 
                            $data .= "<table class='table table-bordered table-striped'>";
                                $data .= "<thead>";
                                    $data .= "<tr>";
                                        $data .= "<th>#</th>";
                                        $data .= "<th>Apellido y Nombre</th>";
                                        $data .= "<th>DNI</th>";
                                        $data .= "<th>CUIL</th>";
                                        $data .= "<th>Teléfono</th>";
                                        $data .= "<th>Dirección</th>";
                                        $data .= "<th>Acciones</th>";                    
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
                                    $data .= "<td style='text-align: center;'>";
                                        $data .= "<a href='./agregarFalta?id=". $row['idAgente'] .".php' class='btn btn-warning        ' role='button'><i class='fas fa-plus-circle'></i></a>";
                                    $data .= "</td>";  
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
                    mysqli_stmt_close($stmt);
                }
                else{
                    echo "Error en la preparacion";
                }
                // Close statement              
            }
            else{
                if((isset($_GET["term"])&&($_GET["type"]=="licencia"))){
                    // Prepare a select statement        
                    $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
                    if($stmt = mysqli_prepare($link, $sql)){            

                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_term);

                        // Set parameters
                        $param_term = $_GET["term"] . '%';


                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            $result = mysqli_stmt_get_result($stmt);
                            // Check number of rows in the result set
                            if(mysqli_num_rows($result) > 0){
                                $data= "<div class='table-responsive-sm'>"; 
                                $data .= "<table class='table table-bordered table-striped'>";
                                    $data .= "<thead>";
                                        $data .= "<tr>";
                                            $data .= "<th>#</th>";
                                            $data .= "<th>Apellido y Nombre</th>";
                                            $data .= "<th>DNI</th>";
                                            $data .= "<th>CUIL</th>";
                                            $data .= "<th>Teléfono</th>";
                                            $data .= "<th>Dirección</th>";
                                            $data .= "<th>Acciones</th>";                    
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
                                        $data .= "<td style='text-align: center;'>";
                                            $data .= "<a href='./agregarLicencia?id=". $row['idAgente'] .".php' class='btn btn-success        ' role='button'><i class='fas fa-plus-circle'></i></a>";
                                        $data .= "</td>";  
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
                        mysqli_stmt_close($stmt);
                    }
                    else{
                        echo "Error en la preparacion";
                    }
                    // Close statement              
                }
                else{
                    if((isset($_GET["term"])&&($_GET["type"]=="informacion"))){
                        // Prepare a select statement        
                        $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
                        if($stmt = mysqli_prepare($link, $sql)){            

                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $param_term);

                            // Set parameters
                            $param_term = $_GET["term"] . '%';


                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                $result = mysqli_stmt_get_result($stmt);
                                // Check number of rows in the result set
                                if(mysqli_num_rows($result) > 0){
                                    $data= "<div class='table-responsive-sm'>"; 
                                    $data .= "<table class='table table-bordered table-striped'>";
                                        $data .= "<thead>";
                                            $data .= "<tr>";
                                                $data .= "<th>#</th>";
                                                $data .= "<th>Apellido y Nombre</th>";
                                                $data .= "<th>DNI</th>";
                                                $data .= "<th>CUIL</th>";
                                                $data .= "<th>Teléfono</th>";
                                                $data .= "<th>Dirección</th>";
                                                $data .= "<th>Acciones</th>";                    
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
                                            $data .= "<td style='text-align: center;'>";
                                                $data .= "<a href='./agregarInformacionAgente?id=". $row['idAgente'] .".php' class='btn btn-info        ' role='button'><i class='fas fa-plus-circle'></i></a>";
                                            $data .= "</td>";  
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
                            mysqli_stmt_close($stmt);
                        }
                        else{
                            echo "Error en la preparacion";
                        }
                        // Close statement              
                    }
                    else{
                        if((isset($_GET["term"])&&($_GET["type"]=="sueldo"))){
                            // Prepare a select statement        
                            $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
                            if($stmt = mysqli_prepare($link, $sql)){            

                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $param_term);

                                // Set parameters
                                $param_term = $_GET["term"] . '%';


                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                                    // Check number of rows in the result set
                                    if(mysqli_num_rows($result) > 0){
                                        $data= "<div class='table-responsive-sm'>"; 
                                        $data .= "<table class='table table-bordered table-striped'>";
                                            $data .= "<thead>";
                                                $data .= "<tr>";
                                                    $data .= "<th>#</th>";
                                                    $data .= "<th>Apellido y Nombre</th>";
                                                    $data .= "<th>DNI</th>";
                                                    $data .= "<th>CUIL</th>";
                                                    $data .= "<th>Teléfono</th>";
                                                    $data .= "<th>Dirección</th>";
                                                    $data .= "<th>Acciones</th>";                    
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
                                                $data .= "<td style='text-align: center;'>";
                                                    $data .= "<a href='./verSueldos?id=". $row['idAgente'] .".php' class='btn btn-success        ' role='button'><i class='fas fa-eye'></i></a>";
                                                $data .= "</td>";  
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
                                mysqli_stmt_close($stmt);
                            }
                            else{
                                echo "Error en la preparacion";
                            }
                            // Close statement                                             
                        
                        }
                        else{
                            
                            
                            if((isset($_GET["term"])&&($_GET["type"]=="liquidacion"))){
                                // Prepare a select statement        
                                $sql = "SELECT * FROM agente WHERE apellidoAgente LIKE ? ORDER BY apellidoAgente";
                                if($stmt = mysqli_prepare($link, $sql)){            

                                    // Bind variables to the prepared statement as parameters
                                    mysqli_stmt_bind_param($stmt, "s", $param_term);

                                    // Set parameters
                                    $param_term = $_GET["term"] . '%';


                                    // Attempt to execute the prepared statement
                                    if(mysqli_stmt_execute($stmt)){
                                        $result = mysqli_stmt_get_result($stmt);
                                        // Check number of rows in the result set
                                        if(mysqli_num_rows($result) > 0){
                                            $data= "<div class='table-responsive-sm'>"; 
                                            $data .= "<table class='table table-bordered table-striped'>";
                                                $data .= "<thead>";
                                                    $data .= "<tr>";
                                                        $data .= "<th>#</th>";
                                                        $data .= "<th>Apellido y Nombre</th>";
                                                        $data .= "<th>DNI</th>";
                                                        $data .= "<th>CUIL</th>";
                                                        $data .= "<th>Teléfono</th>";
                                                        $data .= "<th>Dirección</th>";
                                                        $data .= "<th>Acciones</th>";                    
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
                                                    $data .= "<td style='text-align: center;'>";
                                                        $data .= "<a href='./liquidarSueldo?id=". $row['idAgente'] .".php' class='btn btn-danger        ' role='button'><i class='fas fa-money-bill-alt'></i></a>";
                                                    $data .= "</td>";  
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
                                    mysqli_stmt_close($stmt);
                                }
                                else{
                                    echo "Error en la preparacion";
                                }
                                // Close statement                                             

                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        }
                        
                    }
                }
            }
        }
    }

    // close connection
    mysqli_close($link);
?>