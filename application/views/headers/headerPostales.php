<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Inicio - iPostal</title>
  <meta name="description" content="Proyecto Tecnologías para la Web. Postales">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/fonts/simple-line-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/validetta/validetta.min.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/smoothproducts.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/headerPostalCategory.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/confirm/dist/jquery-confirm.min.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/enviarPostalCSS.css">


    <script src="<?php base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/validetta/validetta.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/validetta/validettaLang-es-ES.js"></script>
    <script src="<?php base_url(); ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/theme.js"></script>
    <script src="<?php base_url(); ?>assets/confirm/dist/jquery-confirm.min.js"></script>
    <script src="<?php base_url(); ?>assets/fontawesome/js/all.min.js"></script>

</head>
<body>
  <div class="fixed-top">
    <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">iPostal</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>inicio">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>caracteristicas">Características</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>postales">Postales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>about">Acerca de</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>contacto">Contáctanos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>login">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>registro">Registrarme</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="myBtnContainer chapternav-category">
      <div class="chapternav-items">
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/todas.png">
          <a class="a todas" id="showAll" onclick="filterSelection('all')" href="#">Todas</a>
        </li>
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/invitacion.png">
          <a class="a invitacion" id="showInv" onclick="filterSelection('invitacion')" href="#">Invitaci&oacute;n</a>
        </li>
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/amor.png">
          <a class="a amor" id="showAmor" onclick="filterSelection('amor')" href="#">Amor</a>
        </li>
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/amistad.png">
          <a class="a amistad" id="showAmistad" onclick="filterSelection('amistad')" href="#">Amistad</a>
        </li>
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/cumpleanos.png">
          <a class="a cumpleanos" id="showCumple" onclick="filterSelection('cumpleanos')" href="#">Cumplea&ntilde;os</a>
        </li>
        <li class="chapternav-item">
          <img src="https://gusanito.com/v5img/img/category_icons/color/saludos.png">
          <a class="a saludos" id="showSaludos" onclick="filterSelection('saludos')" href="#">Saludos</a>
        </li>
      </div>
    </div>
    </div>
