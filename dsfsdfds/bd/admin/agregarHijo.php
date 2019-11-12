<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar hijo</h2></div>                             
            </div>
            <form action="./ajax/addHijo.php" method="post">
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
                <h5>Información sobre el hijo del agente</h5>
                <br>
                <div class="form-group">
                    <label for="apellidoHijo">Apellido/s:</label>
                    <input type="text" name="apellidoHijo">
                </div>
                <div class="form-group">
                    <label for="nombreHijo">Nombre/s:</label>
                    <input type="text" name="nombreHijo">
                </div>
                <div class="form-group">
                    <label for="dniHijo">DNI:</label>
                    <input type="number" name="dniHijo" min="1000000" style="margin-left: 55px;">
                </div>        
                <hr>
                <h5>Información sobre el estudio del hijo</h5>
                <div class="form-group">
                    <label for="estudio">Estudio:</label>
                    <select class="custom-select" id="selectFiltro" name="estudio">
                            <option selected value="otro">Tipo de estudio</option>
                                <option value='primario'>Primario</option> 
                                <option value='secundario'>Secundario</option> 
                                <option value='terciario'>Terciario</option> 
                                <option value='universitario'>Universitario</option> 
                                <option value='otro'>Otro</option>                              
                        </select>
                    <small class="form-text text-muted">Debe indicar el nivel máximo de estudio alcanzado.</small>
                </div>
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

    <script type="text/javascript"  src="agregarHijo.js"></script>
</body>

</html>