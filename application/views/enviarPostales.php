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
                
                
                <form action="" method= "POST">
                    <div align="center" class="row">
                    <div  class="col-md-4 col-lg-6 item">
                    <i id="iconoW" class="fab fa-whatsapp fa-5x green-text"></i> Número de WhatsApp: <input id="whats" name="whats" type="number">
                    </div>
                    <div class="col-md-4 col-lg-6 item">
                    <i id="iconoM" class="fas fa-envelope-square fa-5x red-text"></i> Mail: <input id="mensaje" name="correo" type="text">
                    </div>
</div>
<div class="row">
<div class="col-sm" align="center" id="btnenv">
                   <button id="env" class="btn btn-primary" type="submit">Enviar</button>
                    </div>
</div>
                </form>
                
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
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
if($_POST  ){
    
    
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'omar1cruz2714721@gmail.com';                     // SMTP username
        $mail->Password   = 'fakiebigflip123';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('omar1cruz2714721@gmail.com', 'OmarCruz271');
        $mail->addAddress($_POST["correo"], 'Joe User');     // Add a recipient
        /*$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
        // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Esta es una Postal de iPostal';
        $mail->Body    = 'Esta es una postal <b>FELICIDADES ESTA ES TU POSTAL</b>';
      //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

$data = [

    'phone' => '52'.$_POST["whats"], // Receivers phone
    'body' => 'Tienes una nueva postal de: , en '.$_POST["correo"].", dale un vistazo!" // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu23.chat-api.com/instance77537/sendMessage?token=ubnxw573jbpbun87';
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