<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Reportes_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function obtenerNumeroPostalesEnviadas() {
            $query = $this->db->get('usuariopostal');
            return $query->num_rows();
        }

        public function detallePostales() {
            $sql = "SELECT up.*, p.ruta, c.nombre FROM categoria c, usuariopostal up, postal p WHERE p.idPostal = up.idPostal AND c.idCategoria = p.idCategoria ORDER BY up.fecha DESC;";
            $query = $this->db->query($sql);
            return $query;
        }

        public function categoriasMasGustadas() {
            $this->db->order_by('idCategoria','ASC');
            $query = $this->db->get('categoria');
            return $query;
        }

        public function postalesMasGustadas() {
            # Unicamente va a devolver las 5 mas gustadas, debido a que tenemos 30 postales
            $this->db->order_by('rating','DESC');
            $query = $this->db->get('postal',5);
            return $query;
        }

        public function obtenerEdadGenero() {
            
            $dia=date("d");
            $mes=date("m");
            $ano=date("Y");

            $query = $this->db->query("SELECT nombre,fechaNac,genero FROM usuario ORDER BY 2 DESC;");
            
            for($i = 0;$i < $query->num_rows();$i++) { //Aqui se hara la conversion de la fecha a una edad y genero
                
                $dianaz=date("d",strtotime($query->result()[$i]->fechaNac));
                $mesnaz=date("m",strtotime($query->result()[$i]->fechaNac));
                $anonaz=date("Y",strtotime($query->result()[$i]->fechaNac));
                //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
    
                if (($mesnaz == $mes) && ($dianaz > $dia)) 
                    $ano=($ano-1); 
    
                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
    
                if ($mesnaz > $mes) 
                    $ano=($ano-1);
    
                //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
    
                $edad=($ano-$anonaz);
                $query->result()[$i]->fechaNac = $edad;
                $query->result()[$i]->genero = ($query->result()[$i]->genero == 'm')?"Masculino":"Femenino"; //Aqui es para el genero
            }

            return $query; //Devuelve el array de objetos
        }
    }

?>