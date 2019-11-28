<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Reporte extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('reportes_model');
        }

        public function index() {
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
            $this->load->view('report');
            $this->load->view('footer/footer');
        }

        public function calificacion(){
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
            $data["postales"] = $this->reportes_model->postalesMasGustadas();
            $data['categorias'] = $this->reportes_model->categoriasMasGustadas();
            $this->load->view('charts',$data);
            $this->load->view('footer/footer');
        }
        
        public function detalle() {
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            $data['numero'] = $this->reportes_model->obtenerNumeroPostalesEnviadas();
            $data['postal'] = $this->reportes_model->detallePostales();
            $this->load->view('detail',$data);
            $this->load->view('footer/footer');

        }

        public function usuarios() {
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
            $data['usuario'] = $this->reportes_model->obtenerEdadGenero();
            $this->load->view('user',$data);
            $this->load->view('footer/footer');

        }
    }

?>