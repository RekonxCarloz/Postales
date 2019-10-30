<body>
  <div class="fixed-top">
    <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">iPostal</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>inicio">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>caracteristicas">Características</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php base_url(); ?>postales">Postales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>about">Acerca de</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>contacto">Contáctanos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>login">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>registro">Registrarme</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </div>

    <main class="page gallery-page">
        <section class="clean-block clean-gallery dark">
            <div class="container">
                <div class="block-heading" style="padding-top: 140px;">
                    <h2 class="text-info">Postales</h2>
                </div>
                
                <div class="row">
                <form action="" method= "POST">
                    <div class="col-md-6 col-lg-4 item">
                    <i class="fab fa-whatsapp fa-5x green-text"></i> Número de WhatsApp: <input id="whats" name="whats" type="number">
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                    <i class="fas fa-envelope-square fa-5x red-text"></i> Mail: <input id="mensaje" name="correo" type="text">
                    </div>
                    <div class="col-sm">
                   <button  class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
                </div>
                <div class="row">
                    <div class="col-sm">
                    <br>
                    <img  class="img-thumbnail img-fluid image" id="img1" src="assets/img/postales/amor-amistad/image1.jpg"  >
                    
                    </a></div>
                    
                </div>
            </div>
        </section>
    </main>
    <?php
if($_POST  ){
$data = [

    'phone' => '52'.$_POST["whats"], // Receivers phone
    'body' => 'Tienes una nueva postal de: , en '.$_POST["correo"].", dale un vistazo!" // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu56.chat-api.com/instance76099/sendMessage?token=60n8fbjuhdu0n8oa';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    
    ]
]);
$result = file_get_contents($url, false, $options);


}
?>