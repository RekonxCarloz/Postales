<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Crud_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public $tabla = "usuario";
        public $idTabla = "idUsuario";
        
        public function findAll() { 
            # SELECT * FROM usuario;
            $query = $this->db->get($this->tabla);
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        }

        public function find($id) {
            
            # SELECT * FROM usuario WHERE idUsuario = $id;
            $query = $this->db->get_where($this->tabla,array('idUsuario' => $id));
            return $query->row(); # Retorna solo la fila obtenida
        }

        public function update($id, $data) {
            $this->db->where($this->idTabla,$id);
            $this->db->update($this->tabla,$data);
        }
        
        public function delete($id) {
            $this->db->where($this->idTabla,$id);
            $this->db->delete($this->tabla);
        }

        public function insert($data) {
            $this->db->insert($this->tabla,$data);
            return $this->db->insert_id();
        }
    }

?>