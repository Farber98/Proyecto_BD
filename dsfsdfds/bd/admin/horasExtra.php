<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar horas extra</h2></div>                             
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


    <script type="text/javascript"  src="horasExtra.js"></script>
</body>

</html>
