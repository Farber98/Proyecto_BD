<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar información agente</h2></div>                             
            </div>
            <form>
                <div class="form-group">
                    <label for="nombreAgente">Agente:</label>
                        <input type="text" readonly class="form-control-plaintext" id="nombreAgenteInfo" value="
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
                                    mysqli_close($link);
                                }                                
                        ?>">
                </div>
                <a class="btn btn-warning" href="./agregarPuesto.php?id=<?php echo $_GET['id'];  ?>" role="button">Agregar puesto de trabajo</a>
                <a class="btn btn-success" href="./agregarHijo.php?id=<?php echo $_GET['id'];  ?>" role="button">Agregar hijo/a</a>
                <a class="btn btn-danger" href="./agregarConyuge.php?id=<?php echo $_GET['id'];  ?>" role="button">Agregar conyuge</a>
                
                <input type="hidden" id="custId" name="id" value="<?php echo $_GET['id'];  ?>">
                
            </form>

        </div>
    <!-- Cierra el container la etiqueta de abajo -->
    </div>

    <script type="text/javascript"  src="agregarInformacionAgente.js"></script>
</body>

</html>