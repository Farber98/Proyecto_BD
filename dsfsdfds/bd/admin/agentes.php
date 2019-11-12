<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Lista de agentes</h2></div>
                <!--
                <div class="p-2">
                    <select class="custom-select" id="selectFiltroReparticion">
                        <option selected value="0">Filtrar por reparticion</option>
                        <?php
                            /*
                            // Include config file
                            require_once dirname(__FILE__,2) .'\config.php';
                            // Attempt select query execution
                            echo "<option value='1'> Poder Ejecutivo</option>";
                            $sql = "SELECT * FROM reparticion WHERE Reparticion_idReparticion=1 ORDER BY nombreReparticion";
                            if($result = mysqli_query($link, $sql)){
                                while($row = mysqli_fetch_array($result)){
                                    $data = "<option value='".$row['idReparticion'] ."'>". $row['nombreReparticion'] ."</option>"; 
                                    echo $data;
                                } 
                                
                            }
                            mysqli_free_result($result);
                            */
                        ?>  
                    </select>
                </div> 
                -->
           
                <div class="p-2">
                    <select class="custom-select" id="filtroPlanta">
                        <option selected value="0">Estado de planta...</option>
                        <?php
                            // Include config file
                            require_once dirname(__FILE__,2) .'\config.php';
                            // Attempt select query execution
                            $sql = "SELECT * FROM tipo_empleado ORDER BY nombreTipo";
                            if($result = mysqli_query($link, $sql)){
                                while($row = mysqli_fetch_array($result)){
                                    $data = "<option value='".$row['idTipo_Empleado'] ."'>". $row['nombreTipo'] ."</option>"; 
                                    echo $data;
                                }                                 
                            }
                            mysqli_free_result($result);
                        ?>  
                    </select>
                </div>     
                <div class="form-group p-2">
                     <!--<label for="antiguedad">Antiguedad:</label>-->
                    <input type="number" min="0" class="form-control" id="antiguedad" name="antiguedad" placeholder="Antiguedad..." style="width:80px;" value="0">
                </div>
                <div class="p-2">
                    <button class="btn btn-danger" id="botonFiltro"><i class="fas fa-filter"></i></button>
                </div>
            </div>
            <div class="records_content" style="overflow-x:auto;"></div>   
        </div>
    <!-- Cierra el container la etiqueta de abajo -->
    </div>

    <script type="text/javascript"  src="agentes.js"></script>
</body>

</html>
