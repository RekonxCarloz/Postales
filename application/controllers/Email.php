<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('envios_model');
        $this->load->helper('url');
        $this->load->library('phpmailer_lib');
    }
    
    public function send(){

        $AX = array();
        
        // Load PHPMailer library
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ipostalcontacto@gmail.com';
        $mail->Password = 'contacto123';
        $mail->SMTPSecure = 'TLS';
        $mail->Port     = 587;
        
        $mail->setFrom('ipostalcontacto@gmail.com', 'Web iPostal');
        //$mail->addReplyTo('info@example.com', 'Programacion.net');
        
        // Add a recipient
        $mail->addAddress($_POST["correo"], '');
        
        // Add cc or bcc 
        /*$mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');*/
        
        // Email subject*/
        $mail->Subject = 'Esta es una postal de iPostal';
        

        $imagen = $_POST['imagen'];
        $data = file_get_contents($imagen);
        $mail->addStringAttachment($data, "iPostal.png");

        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = '<b>FELICIDADES ESTA ES TU POSTAL</b>: <br>'.$_POST["mensaje"];
        $mail->Body = $mailContent;
        // Se hace el registro en la tabla usuariopostal a continuacion
        $query = $this->envios_model->ruta($_POST['imagenNombre']);
        $query = $query->row();
        $idImagen = $query->idPostal; # Guarda el id de la imagen que se va a ennviar
        $emailRemitente = $this->session->userdata('priv');
        $emailDestinatario = $_POST['correo'];
        $arrayDatos = array(
            'remitente' => $emailRemitente,
            'destinatario'=> $emailDestinatario,
            'imagen' => $idImagen );
        $bandera = $this->envios_model->registroPostal($arrayDatos); # Se le envia el arreglo que se va a registrar en la base de datos
        if ($bandera) {
            // Send email
            if(!$mail->send()){
                $AX["val"] = 0;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>La postal no ha podido ser enviada\nMailer Error:".$mail->ErrorInfo."</h5>";
                $AX["icon"] = "fas fa-exclamation fa-2x";
                $AX["title"] = "<h4 class='text-info text-danger text-center'>Envío fallido</h4>";
            }else{
                $AX["val"] = 1;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>Tu postal se ha enviado satisfactoriamente</h5>";
                $AX["icon"] = "fas fa-check fa-2x";
                $AX["title"] = "<h4 class='text-info text-success text-center'>¡Envío con éxito!</h4>";
            }
        } else {
            $AX["val"] = 0;
            $AX["msj"] = "<h5 class='text-info text-dark text-center'>La postal no ha podido ser enviada</h5>";
            $AX["icon"] = "fas fa-exclamation fa-2x";
            $AX["title"] = "<h4 class='text-info text-danger text-center'>Envío fallido</h4>";
        }
        
        
        print json_encode($AX, JSON_UNESCAPED_UNICODE);
    }
    
}