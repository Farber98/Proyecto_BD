<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina"><?php
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
                        ?></h2></div>                             
            </div>
            <div class="records_content" style="overflow-x:auto;"></div>   
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


    <script type="text/javascript"  src="verSueldos.js"></script>
</body>

</html>
