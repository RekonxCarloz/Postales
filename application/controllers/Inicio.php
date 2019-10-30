<?php
class Inicio extends CI_Controller {

    public function __construct(){
      parent::__construct();
    }
   public function index(){
     $this->load->view('header');
     $this->load->view('inicio');
     $this->load->view('footer');
   }
   public function caracteristicas(){
     $this->load->view('header');
     $this->load->view('features');
     $this->load->view('footer');
   }
   public function about(){
     $this->load->view('header');
     $this->load->view('about-us');
     $this->load->view('footer');
   }
   public function registro(){
     $this->load->view('header');
     $this->load->view('registration');
     $this->load->view('footer');
   }
   public function login(){
     $this->load->view('header');
     $this->load->view('login');
     $this->load->view('footer');
   }
   public function contacto(){
     $this->load->view('header');
     $this->load->view('contact-us');
     $this->load->view('footer');
   }
   public function postales(){
     $this->load->view('headerPostales');
     $this->load->view('categoriaPostales');
     $this->load->view('footer');
   }
   public function enviarPostales(){
    $this->load->view('header');
    $this->load->view('enviarPostales');
    $this->load->view('footer');
  }
}
?>
