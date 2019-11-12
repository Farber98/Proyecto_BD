<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar licencia</h2></div>                             
            </div>
            <form action="./ajax/addLicencia.php" method="post">
                <div class="form-group">
                    <label for="nombreAgente">Agente:</label>
                        <input type="text" readonly class="form-control-plaintext" id="nombreAgente" value="
                         <?php
                                require_once dirname(__FILE__,2 ) .'\config.php';
                                if(isset($_GET['id'])){
                                    $id =$_GET['id'];
                                    $sql = "SELECT apellidoAgente, nombreAgente FROM agente WHERE idAgente = $id;";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                echo $row['apellidoAgente']. ", " . $row['nombreAgente'];
                                            }
                                        }
                                        else{
                                            echo "ERROR: agente no valido.";
                                        }
                                        mysqli_free_result($result);
                                    }
                                    //mysqli_close($link);
                                }                                
                        ?>">
                </div>
                <div class="form-group">
                    <label for="selectorFechaInicio">Fecha inicio:</label>
                    <input type="date" id="selectorFechaInicio" name="selectorFechaInicio" min="2010-01-01" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group">
                    <label for="diasLicencia">Dias de licencia:</label>
                    <input type="number" name="diasLicencia" min="1">
                </div>
                <div class="form-group">                     
                        <select class="custom-select" id="selectFiltro" name="tipoLicencia">
                            <option selected>Tipo de licencia</option>
                            <?php
                                // Include config file
                                require_once dirname(__FILE__,2) .'\config.php';
                                // Attempt select query execution
                                $sql = "SELECT * FROM tipolicencia WHERE codigoTipoLicencia!=1 ORDER BY nombreTipoLicencia";
                                if($result = mysqli_query($link, $sql)){
                                    while($row = mysqli_fetch_array($result)){
                                        $data = "<option value='".$row['codigoTipoLicencia'] ."'>". $row['nombreTipoLicencia'] ."</option>"; 
                                        echo $data;
                                    } 
                                    mysqli_free_result($result);
                                }else{
                                    echo mysqli_error($link);
                                }
                                mysqli_close($link);
                            ?>  
                        </select>
                </div>
                <input type="hidden" id="custId" name="id" value="<?php echo $_GET['id'];  ?>">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

        </div>
    <!-- Cierra el container la etiqueta de abajo -->
    </div>

    <script type="text/javascript"  src="agregarLicencia.js"></script>
</body>

</html>