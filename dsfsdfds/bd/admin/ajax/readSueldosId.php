<?php
    // Include config file
    require_once dirname(__FILE__,3 ) .'\config.php';

    // Attempt select query execution
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM sueldo WHERE Agente_idAgente = $id;";

        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $data= "<div class='table-responsive-sm'>"; 
                $data .= "<table class='table table-bordered table-striped'>";
                    $data .= "<thead>";
                        $data .= "<tr>";
                            $data .= "<th>#</th>";
                            $data .= "<th>Mes sueldo</th>";
                            $data .= "<th>Anio sueldo</th>";
                            $data .= "<th>Acciones</th>";
                        $data .= "</tr>";
                    $data .= "</thead>";
                    $data .= "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        $data .= "<tr>";
                            $data .= "<td>" . $row['idSueldo'] . "</td>";
                            $data .= "<td>" . $row['mesSueldo'] . "</td>";
                            $data .= "<td>" . $row['anioSueldo'] . "</td>";
                            $data .= "<td style='text-align: center;'>";
                                $data .= "<a href='./verDetalles.php?id=". $row['idSueldo'] ."' class='btn btn-info        ' role='button'><i class='fas fa-eye'></i></a>";
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
    }
?>