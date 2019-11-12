<?php
    //require 'adminAccess.php';
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gobierno de Tucumán</title>
    <link rel="icon" type="image/png" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='admin.css'>
    
</head>

<body>
    
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #B3E5FC;">
            <a class="navbar-brand" href="./admin.php"> <img id="logo" src="../img/gobiernoNav.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" id="menuHome">
                        <a class="nav-link" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item dropdown" id="menuAgentes">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Agentes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="./agentes.php">Ver agentes</a>
                          <a class="dropdown-item" href="./agregarAgente.php">Agregar agente</a>
                          <a class="dropdown-item" href="./informacionAgente.php">Agregar información agente</a>
                          <a class="dropdown-item" href="./impuntualidad.php">Agregar impuntualidad</a>
                          <a class="dropdown-item" href="./falta.php">Agregar falta</a>
                          <a class="dropdown-item" href="./licencia.php">Agregar licencia</a>
                          <a class="dropdown-item" href="./horasExtra.php">Agregar horas extra</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="menuSocios">
                        <a class="nav-link dropdown-toggle" href="./reparticiones.php" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Reparticiones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                          <a class="dropdown-item" href="./reparticiones.php">Ver reparticiones</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="menuSueldos">
                        <a class="nav-link dropdown-toggle" href="./sueldos.php" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Sueldos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                          <a class="dropdown-item" href="./sueldos.php">Ver sueldos</a>
                          <a class="dropdown-item" href="./liquidacionSueldos.php">Liquidar sueldos</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" id="searchbox" type="search" placeholder="Buscar" aria-label="Search" autocomplete="off">
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                </form>
            </div>
        </nav>
        
    <script type='text/javascript'>
            $("#menuHome").addClass("active");
    </script>
        
   
    <div class="row page-header">
            <div class="col-sm-12 col-md-3 col-lg-3" id="columnaLinks">
                <div class="list-group list-group-flush" id="listaLinks">
                     <!-- Para marcar un link como activo hay que agregar la clase "active" al <a> -->
                  <a href="./agentes.php" class="list-group-item list-group-item-action" id="verAgentesOpcion">
                    Ver agentes
                  </a>
                  <a href="./agregarAgente.php" class="list-group-item list-group-item-action"  id="agregarAgenteOpcion">Agregar agente</a>
                  <a href="./informacionAgente.php" class="list-group-item list-group-item-action"  id="informacionAgenteOpcion">Agregar información agente</a>
                  <a href="./reparticiones.php" class="list-group-item list-group-item-action" id="verReparticionesOpcion">Ver reparticiones</a>                
                  <a href="./impuntualidad.php" class="list-group-item list-group-item-action" id="impuntualidadOpcion">Agregar impuntualidad</a>
                  <a href="./falta.php" class="list-group-item list-group-item-action" id="faltaOpcion">Agregar falta</a>
                  <a href="./licencia.php" class="list-group-item list-group-item-action" id="licenciaOpcion">Agregar licencia</a>
                  <a href="./horasExtra.php" class="list-group-item list-group-item-action" id="horasExtraOpcion">Agregar horas extra</a>
                  <a href="./sueldos.php" class="list-group-item list-group-item-action" id="verSueldosOpcion">Ver sueldos</a>
                  <a href="./liquidacionSueldos.php" class="list-group-item list-group-item-action" id="liquidarSueldosOpcion">Liquidar sueldos</a>

                </div>            
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 d-flex justify-content-between">
                <div class="mr-auto p-2" id="appendableDiv">
                    
                </div>
            </div>
    </div>