<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden_model extends CI_Model {
   var $table = 'orden';

   function __construct(){
    parent::__construct();
    $this->load->database();
}

function obtener(){
    $res = $this->db->get('orden');
    if ($res->num_rows() > 0) return $res;
    else return false;
}

function obtenerxId($codorden){
    $res = $this->db->get_where('orden',array('CODORDEN' => $codorden));
    if ($res->num_rows() > 0) return $res;
    else return false;
}

function obtenerxTipo($codtipousuario){
    $res = $this->db->get_where('usuario',array('CODTIPOUSUARIO' => $codtipousuario));
    if ($res->num_rows() > 0) return $res;
    else return false;
}


function guardar($data){
    $this->db->insert('orden',$data);
    return $this->db->insert_id();
} 

function obtenertabla(){
    $res = $this->db->select('or.codorden,i.descripcion origen,o.nombres odontologo,p.nombres paciente,or.fecharecepcion,or.fechaentrega,c.descripcion clasificacion,or.estado');
    $res = $this->db->from('orden or');
    $res = $this->db->join('clasificacion c','c.codclasificacion = or.codclasificacion');
    $res = $this->db->join('instituciones i','i.codinstitucion = or.codinstitucion');
    $res = $this->db->join('filiacion f','f.codfiliacion = or.codfiliacion');
    $res = $this->db->join('persona o','o.codpersona = or.cododontologo');
    $res = $this->db->join('persona p','p.codpersona = or.codpaciente');                        
    $res = $this->db->get();
    if ($res->num_rows() > 0) return $res->result();
    else return false;
}

public function count_all()
{
    $this->db->from($this->table);
    return $this->db->count_all_results();
}

function obtenertablabyId($codorden){
    $res = $this->db->select('or.codorden,or.codclasificacion tipo,or.codinstitucion origen,or.codpaciente,or.cododontologo,o.nombres nombreOdontologo,p.nombres nombrePaciente,or.fecharecepcion,or.fechaentrega,or.adherente,or.estado,or.codfiliacion');
    $res = $this->db->from('orden or');
    $res = $this->db->join('persona o','o.codpersona = or.cododontologo');
    $res = $this->db->join('persona p','p.codpersona = or.codpaciente');    
    $res = $this->db->where('or.codorden',$codorden);
    $res = $this->db->get();
    if ($res->num_rows() > 0) return $res->row();
    else return false;
}

function actualizarOrden($where, $data){
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
}

}