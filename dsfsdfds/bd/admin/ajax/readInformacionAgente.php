<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution

    $sql = "SELECT * FROM agente ORDER BY apellidoAgente;";

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
                            $data .= "<a href='./agregarInformacionAgente.php?id=". $row['idAgente'] ."' class='btn btn-info        ' role='button'><i class='fas fa-plus-circle'></i></a>";
                        $data .= "</td>";                                    
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