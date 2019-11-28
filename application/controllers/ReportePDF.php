<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

    class ReportePDF extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('reportes_model');
        }

        public function usuario () {
            
            if ($this->session->userdata('login') == 2) {

                $data['usuario'] = $this->reportes_model->obtenerEdadGenero();
                
                $mpdf = new \Mpdf\Mpdf();
                $html = $this->load->view('user',$data,true);
                $mpdf->WriteHTML($html);
                $mpdf->Output(); // opens in browser
                //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
        }

        public function postal() {
            if ($this->session->userdata('login') == 2) {

                $data['numero'] = $this->reportes_model->obtenerNumeroPostalesEnviadas();
                $data['postal'] = $this->reportes_model->detallePostales();
                
                $mpdf = new \Mpdf\Mpdf();
                $html = $this->load->view('detail',$data,true);
                $mpdf->WriteHTML($html);
                $mpdf->Output(); // opens in browser
                //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
        }

        public function graficas() {
            if ($this->session->userdata('login') == 2) {

                $data["postales"] = $this->reportes_model->postalesMasGustadas();
                $data['categorias'] = $this->reportes_model->categoriasMasGustadas();
                
                    
                $mpdf = new \Mpdf\Mpdf();
                $html = $this->load->view('charts2',$data,true);
                $mpdf->WriteHTML($html);
                $mpdf->Output(); // opens in browser
                //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
        }
 
    }
?>