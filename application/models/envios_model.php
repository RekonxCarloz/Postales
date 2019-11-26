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
                AND up.email = '$email' ORDER BY 2 DESC;");
            if($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        }

        public function getRecibidas() {
            $email = $this->session->userdata('priv');
            $query = $this->db->query("
            SELECT up.email, up.fecha, p.ruta, c.nombre FROM categoria c, usuariopostal up, postal p WHERE p.idPostal = up.idPostal
            AND c.idCategoria = p.idCategoria
            AND up.emailDestinatario = '$email' ORDER BY 2 DESC;");
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        }

        public function getDatos() {
            $data = array();
            $email = $this->session->userdata('priv');
            $query = $this->db->get_where('usuario',array('email' => $email));
            if ($query->num_rows() > 0) {
                $query = $query->row();
                $data[0] = $query->nombre;
                $data[1] = $query->email;
                $data[2] = $query->celular;
                $data[3] = ($query->genero == 'm')?"Masculino":"Femenino";
                $data[4] = $query->fechaNac;
                return $data;
            } else {
                return null;
            }
            
        }

        # Las siguientes consultas son para el controlador Email

        public function ruta($nombre) {
            $query = $this->db->get_where('postal', array('nombre' => $nombre ));
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        }

        public function registroPostal($array) {
            $date = new DateTime();
            $date->modify('-7 hours');
            $data = array(
                'email' => $array['remitente'],
                'idPostal' => $array['imagen'],
                'fecha' => $date->format('Y-m-d H:i:s'),
                'emailDestinatario' => $array['destinatario']
            );
            $this->db->insert('usuariopostal',$data);
            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                return false;
            }
            
        }
    }

?>