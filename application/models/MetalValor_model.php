<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metalvalor_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function obtener(){
        $res = $this->db->get('metalvalor');
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerxNombre($descripcion){
        $res = $this->db->select('mv.codmetalvalor id,m.descripcion as text');
        $res = $this->db->from('metalvalor mv');
        $res = $this->db->join('metal m','mv.codmetal = m.codmetal');
        $res = $this->db->like(array('m.descripcion' => $descripcion));
        $res = $this->db->limit(20);
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerId($codPersona){
        $res = $this->db->get_where('persona',array('CODPERSONA' => $codPersona));
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerIdResumido($codPersona){
      $res=$this->db->select('*');
      $res = $this->db->where('CODPERSONA',$codPersona);
      $res = $this->db->get('persona');
       return $res;
    }

    function obtenerxCorreo($correo){
        $res = $this->db->get_where('persona',array('MAIL' => $correo));
        if ($res->num_rows() > 0) return $res;
        else return false;
    }
    
    function crear($data){
        $this->db->insert('persona',
            array('RUT'=>$data['rut'],
                   'DV'=>$data['dv'],
                   'NOMBRE'=>$data['nombre'],
                   'PATERNO'=>$data['paterno'],
                   'MATERNO'=>$data['materno'],
                   'DIRECCION'=>$data['direccion'],
                   'IDCOMUNA'=>$data['idcomuna'],
                   'TELEFONO'=>$data['telefono'],
                   'CELULAR'=>$data['celular'],
                   'MAIL'=>$data['mail'],
                   'ESTADO'=>1,
                   'PASSWORD'=>$data['password']));
        return $this->db->insert_id();

    } 

    function delete($rut){
      $this->db->delete('persona',array('RUT' => $rut));
    }

    function update($data,$rut){
      $this->db->update('persona',$data,array('RUT' => $rut));
    }

    function updateCodPersona($data,$codpersona){
      $this->db->update('persona',$data,array('CODPERSONA' => $codpersona));
    }

    function get(){
      $query = $this->db->select('RUT,DV,NOMBRE,PATERNO,MATERNO,DIRECCION,CELULAR,TELEFONO,MAIL')->get('persona');
      $fields = $query->field_data();    
    return array("fields" => $fields, "query" => $query);
    }

    function cuenta(){
      return $this->db->count_all('persona');
    }

    function obtenerExcel(){
    $res = $this->db->select("RUT,DV,NOMBRE,PATERNO,MATERNO,DIRECCION,TELEFONO,CELULAR,MAIL")->get('persona');
    return $res;
    }

    function obtenerCabecerasExcel(){
    $res = $this->db->select('RUT,DV,NOMBRE,PATERNO,MATERNO,DIRECCION,TELEFONO,CELULAR,MAIL')->get('persona',1);
    return $res;
    }
}