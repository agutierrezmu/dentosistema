<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instituciones_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function obtener(){
        $res = $this->db->get('instituciones');
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerxId($codPersona){
        $res = $this->db->get_where('persona',array('CODPERSONA' => $codPersona));
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerxTipo($codtipousuario){
        $res = $this->db->get_where('usuario',array('CODTIPOUSUARIO' => $codtipousuario));
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
}