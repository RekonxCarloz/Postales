<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Inicio - iPostal</title>
  <meta name="description" content="Proyecto Tecnologías para la Web. Postales">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
  <link rel="stylesheet" href="<?=base_url() ?>assets/fonts/simple-line-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/css/validetta/validetta.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/css/smoothproducts.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/css/headerPostalCategory.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/confirm/dist/jquery-confirm.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/css/enviarPostalCSS.css">
  <link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.thumbs.css">


    <script src="<?=base_url() ?>assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="<?=base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="<?=base_url() ?>assets/js/validetta/validetta.min.js"></script>
    <script src="<?=base_url() ?>assets/js/validetta/validettaLang-es-ES.js"></script>
    <script src="<?=base_url() ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?=base_url() ?>assets/js/theme.js"></script>
    <script src="<?=base_url() ?>assets/confirm/dist/jquery-confirm.min.js"></script>
    <script src="<?=base_url()?>assets/js/modernizr.custom.28468.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.cslider.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.thumbs.js"></script>
    <noscript>
			<link rel="stylesheet" type="text/css" href="css/nojs.css" />
		</noscript>

</head>
<body>
  <div class="fixed-top">
    <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="<?=base_url() ?>inicio">iPostal</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?=base_url() ?>inicio">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url() ?>caracteristicas">Características</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url() ?>postales">Postales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url() ?>about">Acerca de</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url() ?>contacto">Cont&aacute;ctanos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url()?>historial"><?= $name ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url()?>salir">Cerrar Sesi&oacute;n</a></li>
                </ul>
            </div>
        </div>
    </nav>
