</div>
<main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contáctanos</h2>
                    <p>Envíanos tu opinión para mejorar el sitio.&nbsp;</p>
                </div>
                <form>
                    <div class="form-group"><label>Nombre completo</label><input class="form-control" type="text" placeholder="<?=$nombreCompleto?>" disabled></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email" placeholder="<?=$email?>" disabled></div>
                    <div class="form-group"><label>Asunto</label><input name="asunto" class="form-control" type="text"></div>
                    <div class="form-group"><label>Mensaje</label><textarea name="contactMensaje"class="form-control"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Enviar</button></div>
                </form>
            </div>
        </section>
</main>

<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

if($_POST  ){
    set_time_limit(300);

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
        $mail->Username   = 'ipostalcontacto@gmail.com';                     // SMTP username
        $mail->Password   = 'contacto123';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ipostalcontacto@gmail.com', $_POST['asunto']);
        $mail->addAddress($_POST["correo"], $_POST['nombreCompleto']);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['asunto'];
        $mail->Body    = $_POST['contactMensaje'];
      //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }





 ?>
