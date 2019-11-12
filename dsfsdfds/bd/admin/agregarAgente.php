<?php
    require_once "headerAdmin.php";
?>
        <div id="appendHome">
           <div class="d-flex justify-content-between">
                <div class="mr-auto p-2"><h2 id="titulo_pagina">Agregar agente</h2></div>                             
            </div>
            <hr>
            <h5>Información personal del agente</h5>
            <form action="./ajax/addAgente.php" method="post" id="formAgregarAgente">
                <div class="form-group">
                    <label for="apellidoAgente">Apellido/s:</label>
                    <input type="text" name="apellidoAgente">
                </div>
                <div class="form-group">
                    <label for="nombreAgente">Nombre/s:</label>
                    <input type="text" name="nombreAgente">
                </div>
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="number" name="dni" min="1000000" style="margin-left: 55px;">
                </div>        
                <div class="form-group">
                    <label for="cuil">CUIL:</label>
                    <input type="number" name="cuil" min="1000000" style="margin-left: 50px;">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" style="margin-left: 16px;">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="number" name="telefono" min="10000" style="margin-left: 20px;">
                </div>
                
                <hr>
                <h5>Información sobre los estudios del agente</h5>
                <div class="form-group">
                    <label for="estudio">Estudio:</label>
                    <select class="custom-select" id="selectFiltro" name="estudio">
                            <option selected value="otro">Tipo de estudio</option>
                                <option value='terciario'>Terciario</option> 
                                <option value='universitario'>Universitario</option> 
                                <option value='posgrado'>Posgrado</option> 
                                <option value='doctorado'>Doctorado</option> 
                                <option value='otro'>Otro</option>                              
                        </select>
                    <small class="form-text text-muted">Debe indicar el nivel máximo de estudio alcanzado.</small>
                </div>
                
                <hr>
                <h5>Información sobre el seguro de vida del agente</h5>
                <div class="form-group">
                    <label for="apellidoSeguro">Apellido/s:</label>
                    <input type="text" name="apellidoSeguro">
                </div>
                <div class="form-group">
                    <label for="nombreSeguro">Nombre/s:</label>
                    <input type="text" name="nombreSeguro">
                </div>
                <div class="form-group">
                    <label for="dniSeguro">DNI:</label>
                    <input type="number" name="dniSeguro" min="1000000" style="margin-left: 55px;">
                </div>                       
                <div class="form-group">
                    <label for="telefonoSeguro">Telefono:</label>
                    <input type="number" name="telefonoSeguro" min="10000" style="margin-left: 22px;">
                </div>
                
                <hr>
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
    <script type="text/javascript"  src="agregarAgente.js"></script>
</body>

</html>