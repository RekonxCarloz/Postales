<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Envios_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function getEnviadas() {
            $email = $this->session->userdata('priv');
            $query = $this->db->query("
                SELECT up.emailDestinatario, up.fecha, p.ruta, c.nombre FROM categoria c, usuariopostal up, postal p 
                WHERE p.idPostal = up.idPostal 
                AND c.idCategoria = p.idCategoria 
                AND up.email = '$email' ORDER BY 2;");
            if($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        }
    }

?>