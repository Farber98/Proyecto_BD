<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Detalles de sueldo #<?php  echo $_GET["id"]; ?>
                    </h2></div>                             
            </div>
            <div class="records_content" style="overflow-x:auto;"></div>   
        </div>
    <!-- Cierra el container la etiqueta de abajo -->
    </div>


    <script type="text/javascript"  src="verDetalles.js"></script>
</body>

</html>
