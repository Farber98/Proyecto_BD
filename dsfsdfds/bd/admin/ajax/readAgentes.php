<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution
    if(isset($_GET['estado'])&&isset($_GET['antiguedad'])){
        $estado = $_GET['estado'];
        $antiguedad = $_GET['antiguedad'];
        
        $antMenor=$antiguedad * 365;
                
      
        
        $antMayor = ($antMenor) + 365;
        //echo "la antiguedad va desde ".$antMenor." hasta ".$antMayor;
        $sql = "SELECT Agente.idAgente AS 'idAgente', Agente.CUIL as 'CUIL', Agente.nombreAgente AS 'nombreAgente', Agente.apellidoAgente AS 'apellidoAgente', Agente.DNI AS 'DNI', Reparticion.idReparticion AS 'idReparticion', Reparticion.nombreReparticion AS 'nombreReparticion', Agente.antiguedad, Puesto.Tipo_Empleado_idTipo_Empleado
                FROM 
                    Agente INNER JOIN Agente_has_Puesto 
                        ON Agente.idAgente = Agente_has_Puesto.Agente_idAgente 
                    INNER JOIN Puesto 
                        ON Agente_has_Puesto.Puesto_idCategoria = Puesto.idCategoria
                    INNER JOIN Reparticion ON Puesto.Reparticion_idReparticion = Reparticion. idReparticion
               
                WHERE Puesto.Tipo_Empleado_idTipo_Empleado = $estado AND Agente.antiguedad <= $antMayor AND Agente.antiguedad >= $antMenor
                ORDER BY apellidoAgente;";

        //$sql = "SELECT * FROM agente WHERE idAgente=$id ORDER BY apellidoAgente;";
    }
    else{
        //$sql = "SELECT * FROM agente ORDER BY apellidoAgente;";
        $sql = "SELECT Agente.idAgente AS 'idAgente', Agente.CUIL as 'CUIL', Agente.nombreAgente AS 'nombreAgente', Agente.apellidoAgente AS 'apellidoAgente', Agente.DNI AS 'DNI', Reparticion.idReparticion AS 'idReparticion', Reparticion.nombreReparticion AS 'nombreReparticion'
                FROM 
                    Agente INNER JOIN Agente_has_Puesto 
                        ON Agente.idAgente = Agente_has_Puesto.Agente_idAgente 
                    INNER JOIN Puesto 
                        ON Agente_has_Puesto.Puesto_idCategoria = Puesto.idCategoria
                    INNER JOIN Reparticion ON Puesto.Reparticion_idReparticion = Reparticion. idReparticion
                ORDER BY apellidoAgente;";
    }
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            $data= "<div class='table-responsive-sm'>"; 
            $data .= "<table class='table table-bordered table-striped'>";
                $data .= "<thead>";
                    $data .= "<tr>";
                        $data .= "<th>#</th>";
                        $data .= "<th>Apellido y Nombre</th>";
                        $data .= "<th>DNI</th>";
                        $data .= "<th>CUIL</th>";
                        $data .= "<th>#Repartición</th>";
                        $data .= "<th>Nombre</th>";
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
                        $data .= "<td>" . $row['idReparticion'] . "</td>";
                        $data .= "<td>" . $row['nombreReparticion'] . "</td>";
                        $data .= "<td style='text-align: center;'>";
                            $data .= "<a href='./verAgente.php?id=". $row['idAgente'] ."' class='btn btn-primary' role='button'><i class='fas fa-eye'></i></a>";
                        $data .= "</td>";
                        
                        /*
                        $data .= "<td>";
                            $data .= "<button onclick='getUserDetails(".$row['id'].")' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></button> ";  
                            $data .= "<button onclick='confirmDelete(".$row['id'].")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>";                                  
                        $data .= "</td>";
                        */
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
    
    // Close connection
    mysqli_close($link);
?>