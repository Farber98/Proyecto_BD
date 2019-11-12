<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
            <!--<h2 id="titulo_pagina">Bienvenido al sitio de gestión</h2>-->
            
            <div class="jumbotron" style="margin-top:50px;">
                <div class="overlay"></div>
                <div class="inner">
                    <h2 class="display-3" style="font-size: 40px; padding-top:140px; color: white;">Bienvenidos al sistema de gestión</h2>
                    <p class="lead" style="color: white;">Este sistema es una herramienta que le permitirá manejar todos los datos referidos
            a empleados publicos de cualquier repartición.</p>                
                </div>
            </div>
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
    
    
    <script type="text/javascript"  src="admin.js"></script>
</body>

</html>
