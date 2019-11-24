<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Crud_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public $tabla = "usuario";
        public $idTabla = "idUsuario";
        
        public function findAll() { 
            $this->db->select();
            $this->db->form($this->tabla);
            # SELECT * FROM usuario;
            $query = $this->db->get();
            return $query->result(); #Retorna la matriz de resultados
        }

        public function find($id) {
            
            $this->db->select();
            $this->db->from($this->tabla);
            $this->db->where($this->idTabla,$id);
            # SELECT * FROM usuario WHERE idUsuario = $id;
            $query = $this->db->get();
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