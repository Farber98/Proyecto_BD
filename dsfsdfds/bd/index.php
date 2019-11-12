<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Urban Fitness</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        -->
    </head>
    <body>
       <script type="text/javascript"  src="index.js"></script>
       <div class="wrapper">
           <div class="container">
                    <div id="loginForm">
                        <div id="logoDiv">
                            <img id="logo" src="img/secretaria.png" class="center-block">
                            <hr/>
                        </div>
                        <form action="indexResp.php" method="post">
                            <fieldset>  
                                <h4>Inicie sesión</h4>
                                <div class="form-group">
                                    <input type="email" required class="form-control" name="email" placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                    <input type="password" required class="form-control" name="password" placeholder="Contraseña">
                                </div>
                                <button type="submit" name="submit" class="btn btn-info">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
           </div>
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
    </body>
</html>