<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar puesto del agente</h2></div>                             
            </div>
            <form action="./ajax/addPuesto.php" method="post">
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
                <hr>
                <h5>Información sobre el puesto del agente</h5>
                <br>
                <div class="form-group">
                    <label for="nombrePuesto">Nombre del puesto:</label>
                    <input type="text" name="nombrePuesto">
                </div>
                <div class="form-group">
                    <label for="numeroCategoriaPuesto">Número de categoría del puesto:</label>
                    <input type="number" name="numeroCategoriaPuesto" min="1" max="24">
                    <small class="form-text text-muted">Debe indicar un numero entre 1 y 24.</small>

                </div>
                <hr>   
                <div class="form-group">
                    <label for="numeroDecretoPuesto">Numero del decreto de designación:</label>
                    <input type="number" name="numeroDecretoPuesto">
                </div>
                <div class="form-group">
                    <label for="fechaDecretoPuesto">Fecha del decreto de designación:</label>
                    <input type="date" id="fechaDecretoPuesto" name="fechaDecretoPuesto" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de inicio del puesto:</label>
                    <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <hr>                
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Marque si desea agregar fecha de fin</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="fechaFin">Fecha de fin del puesto:</label>
                    <input type="date" disabled id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d"); ?>">
                    <small class="form-text text-muted">Debe indicarla solo en el caso que el puesto se haya terminado.</small>
                </div>   
                <hr>
                <div class="form-group">   
                        <label for="tipoEmpleado">Tipo de empleado:</label>
                        <select class="custom-select" id="selectFiltro" name="tipoEmpleado">
                            <option selected>Tipo de empleado</option>
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
                                    mysqli_free_result($result);
                                }else{
                                    echo mysqli_error($link);
                                }
                                //mysqli_close($link);
                            ?>  
                        </select>
                </div>
                <hr>
                <div class="form-group">   
                        <label for="reparticion">Repartición:</label>
                        <select class="custom-select" name="reparticion">
                            <option selected>Seleccione reparticion...</option>
                            <?php
                                // Include config file
                                require_once dirname(__FILE__,2) .'\config.php';
                                // Attempt select query execution
                                echo "<option value='1'> Poder Ejecutivo</option>";
                                $sql = "SELECT a.idReparticion AS 'idReparticion' ,a.nombreReparticion AS 'nombreReparticion',
                                        b.idReparticion AS 'superReparticionId',b.nombreReparticion AS 'superReparticionNombre'
                                        FROM reparticion a, reparticion b
                                        WHERE a.Reparticion_idReparticion = b.idReparticion 
                                        ORDER BY a.nombreReparticion";
                                if($result = mysqli_query($link, $sql)){
                                    while($row = mysqli_fetch_array($result)){
                                        $data = "<option value='".$row['idReparticion'] ."'>". $row['superReparticionNombre'] . " - ". $row['nombreReparticion'] ."</option>"; 
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
                <hr>
                <input type="hidden" id="custId" name="id" value="<?php echo $_GET['id'];  ?>">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

        </div>                                                  
    <!-- Cierra el container la etiqueta de abajo -->
    </div>

<!-- Modal que retorna mensaje --> 
   <div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="titulo">
                    <h4 class="modal-title" id="myModalLabel">Aviso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" id="message_returned">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Modal que retorna mensaje --> 

    <script type="text/javascript"  src="agregarPuesto.js"></script>
</body>

</html>