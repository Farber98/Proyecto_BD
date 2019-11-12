<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar cónyuge del agente</h2></div>                             
            </div>
            <form action="./ajax/addConyuge.php" method="post">
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
                <h5>Información sobre el cónyuge del agente</h5>
                <br>
                <div class="form-group">
                    <label for="apellidoConyuge">Apellido/s:</label>
                    <input type="text" name="apellidoConyuge">
                </div>
                <div class="form-group">
                    <label for="nombreConyuge">Nombre/s:</label>
                    <input type="text" name="nombreConyuge">
                </div>
                <div class="form-group">
                    <label for="dniConyuge">DNI:</label>
                    <input type="number" name="dniConyuge" min="1000000" style="margin-left: 55px;">
                </div>        
                <hr>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de inicio del matrimonio:</label>
                    <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <hr>                
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Marque si desea agregar fecha de fin</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="fechaFin">Fecha de fin del matrimonio:</label>
                    <input type="date" disabled id="fechaFin" name="fechaFin" value="<?php echo date("Y-m-d"); ?>">
                    <small class="form-text text-muted">Debe indicarla solo en el caso que el matrimonio haya terminado.</small>
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

    <script type="text/javascript"  src="agregarConyuge.js"></script>
</body>

</html>