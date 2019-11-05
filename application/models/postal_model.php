<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Postal_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function registrarUsuario($data) {
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $this->db->query($sql,$data['email']);
            if($this->db->affected_rows() == 1) {
                return FALSE;
            } else {

                $this->db->insert('usuario',array(
                        'nombre' => $data['nombre'],
                        'contrasena' => md5($data['contrasena']),
                        'email' => $data['email'],
                        'celular' => $data['celular'],
                        'genero' => $data['genero'],
                        'fechaNac' => $data['fecha'],
                        'privilegio' => 0
                ));
                if ($this->db->affected_rows() == 1) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }
?>
