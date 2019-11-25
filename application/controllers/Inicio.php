<?php
class Inicio extends CI_Controller {

    public function __construct(){
      parent::__construct();
    }

   public function index(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('tipoInicios/inicioLoginUser');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('tipoInicios/inicioLoginAdmin');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('tipoInicios/inicio');
      $this->load->view('footer/footer');
    }
   }

   public function caracteristicas(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('features');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('features');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('features');
      $this->load->view('footer/footer');
    }
   }

   public function about(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('about-us');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('about-us');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('about-us');
      $this->load->view('footer/footer');
    }
   }

   public function registro(){
    $dato = $this->session->userdata('login');
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('registration');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url()); # Si la sesion esta activa no puedes acceder al registro
  }

  public function login(){
    $dato = $this->session->userdata('login');
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('login');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url()); # Si la sesión está activa no puedes acceder al login
   }

   public function contacto(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('contact-us');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('contact-us');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('contact-us');
      $this->load->view('footer/footer');
    }
   }
   public function postales(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales

     $this->load->view('categoriaPostales');
     $this->load->view('footer/footer');
   }
   public function crearPDF($nombre_imagen){
     echo($nombre_imagen);
    $array_urls = array(
      "amor1" => "assets/img/postales/amor/image1.png",
      "amor2" => "assets/img/postales/amor/image2.png",
      "amor3" => "assets/img/postales/amor/image3.png",
      "amor4" => "assets/img/postales/amor/image4.png",
      "amor5" => "assets/img/postales/amor/image5.png",
      "amistad1" =>"assets/img/postales/amistad/image1.png",
      "amistad2" =>"assets/img/postales/amistad/image2.png",
      "amistad3" =>"assets/img/postales/amistad/image3.png",
      "amistad4" =>"assets/img/postales/amistad/image4.png",
      "amistad5" =>"assets/img/postales/amistad/image5.png",
      "cumpleanos1" =>"assets/img/postales/cumpleanos/image1.png",
      "cumpleanos2" =>"assets/img/postales/cumpleanos/image2.png",
      "cumpleanos3" =>"assets/img/postales/cumpleanos/image3.png",
      "cumpleanos4" =>"assets/img/postales/cumpleanos/image4.png",
      "cumpleanos5" =>"assets/img/postales/cumpleanos/image5.png",
      "invitacion1" =>"assets/img/postales/invitacion/image1.png",
      "invitacion2" =>"assets/img/postales/invitacion/image2.png",
      "invitacion3" =>"assets/img/postales/invitacion/image3.png",
      "invitacion4" =>"assets/img/postales/invitacion/image4.png",
      "invitacion5" =>"assets/img/postales/invitacion/image5.png",
      "saludos1" =>"assets/img/postales/saludos/image1.png",
      "saludos2" =>"assets/img/postales/saludos/image2.png",
      "saludos3" =>"assets/img/postales/saludos/image3.png",
      "saludos4" =>"assets/img/postales/saludos/image4.png",
      "saludos5" =>"assets/img/postales/saludos/image5.png",


    );
    $data = array();
    $data["imagen"] = $array_urls[$nombre_imagen];
    $this->load->view('crearMPDF',$data);
   }
   public function descargarPostales($info){
    
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales
    echo("esta es tu info: ");
    $data = array();
    $data["imagen"] =$info;
    echo($info);
     $this->load->view('descargarPostal', $data);
     $this->load->view('footer/footer');
   }


   public function enviarPostales($nombre_imagen){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    print_r("Hola este es el nombre ".$nombre_imagen);
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales

      $array_urls = array(
        "amor1" => "assets/img/postales/amor/image1.png",
        "amor2" => "assets/img/postales/amor/image2.png",
        "amor3" => "assets/img/postales/amor/image3.png",
        "amor4" => "assets/img/postales/amor/image4.png",
        "amor5" => "assets/img/postales/amor/image5.png",
        "amistad1" =>"assets/img/postales/amistad/image1.png",
        "amistad2" =>"assets/img/postales/amistad/image2.png",
        "amistad3" =>"assets/img/postales/amistad/image3.png",
        "amistad4" =>"assets/img/postales/amistad/image4.png",
        "amistad5" =>"assets/img/postales/amistad/image5.png",
        "cumpleanos1" =>"assets/img/postales/cumpleanos/image1.png",
        "cumpleanos2" =>"assets/img/postales/cumpleanos/image2.png",
        "cumpleanos3" =>"assets/img/postales/cumpleanos/image3.png",
        "cumpleanos4" =>"assets/img/postales/cumpleanos/image4.png",
        "cumpleanos5" =>"assets/img/postales/cumpleanos/image5.png",
        "invitacion1" =>"assets/img/postales/invitacion/image1.png",
        "invitacion2" =>"assets/img/postales/invitacion/image2.png",
        "invitacion3" =>"assets/img/postales/invitacion/image3.png",
        "invitacion4" =>"assets/img/postales/invitacion/image4.png",
        "invitacion5" =>"assets/img/postales/invitacion/image5.png",
        "saludos1" =>"assets/img/postales/saludos/image1.png",
        "saludos2" =>"assets/img/postales/saludos/image2.png",
        "saludos3" =>"assets/img/postales/saludos/image3.png",
        "saludos4" =>"assets/img/postales/saludos/image4.png",
        "saludos5" =>"assets/img/postales/saludos/image5.png",


      );
      $data = array();
      $data["imagen"] = $array_urls[$nombre_imagen];
      $data["nombreP"]= $n;
    $this->load->view('enviarPostales',$data);
    $this->load->view('footer/footer');
  }

  public function historial() {
    
    $this->load->model('envios_model');
    $data['datos'] = $this->envios_model->getDatos(); # Aqui guarda la consulta de los datos de usuario
    $data['enviadas'] = $this->envios_model->getEnviadas(); # Aqui guarda la consulta de las postales enviadas
    $data['recibidas'] = $this->envios_model->getRecibidas(); # Aqui guarda la consulta de las postales recibidas
        $dato = $this->session->userdata('login');
        $n = array('name' => $this->session->userdata('nombre'));
        $justName= explode(" ",$n["name"]);
        $n["name"] = $justName[0];
        if ($dato == 1 || $dato == 2) {
            if ($dato == 1) {
                $this->load->view('headers/headerActiveSesion',$n);
                $this->load->view('history',$data);
                $this->load->view('footer/footer');
            } else {
                $this->load->view('headers/headerAdmin');
                $this->load->view('history',$data);
                $this->load->view('footer/footer');
            }
        } else header("Location: ". base_url()."inicio");
  }

  public function cerrarSesion() {
    $this->session->sess_destroy();
    header("Location: ". base_url());
  }
}
?>
