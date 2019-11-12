<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar horas extra</h2></div>                             
            </div>
            <form action="./ajax/addHorasExtra.php" method="post">
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
                                    mysqli_close($link);
                                }                                
                        ?>">
                </div>
                <div class="form-group">
                    <label for="selectorFecha">Fecha:</label>
                    <input type="date" id="selectorFecha" name="selectorFecha" min="2010-01-01" value="<?php echo date("Y-m-d"); ?>">
                </div>                
                <div class="form-group">
                    <label for="cantidadHoras">Cantidad de horas extra:</label>
                    <input type="number" name="cantidadHoras" min="1">
                </div>
                <input type="hidden" id="custId" name="id" value="<?php echo $_GET['id'];  ?>">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

        </div>
    <!-- Cierra el container la etiqueta de abajo -->
    </div>

    <script type="text/javascript"  src="agregarHorasExtra.js"></script>
</body>

</html>