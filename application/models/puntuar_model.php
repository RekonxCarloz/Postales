<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Puntuar_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function puntoPostal($nombre) {
            $this->db->query("
            UPDATE postal SET rating = rating + 1 WHERE nombre = '$nombre';
            ");
            if ($this->db->affected_rows() == 1) {
                return true;
            } else return false;
        }

        public function puntoCategoria($nombre) {
            $query = $this->db->get_where('postal',array('nombre' => $nombre));
            $query = $query->row();
            $this->db->query("
            UPDATE categoria SET rating = rating + 1 WHERE idCategoria = '$query->idCategoria';
            ");
            if ($this->db->affected_rows() == 1) {
                return true;
            } else return false;
        }
    }

?>