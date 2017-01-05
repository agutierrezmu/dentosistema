<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalleorden_model extends CI_Model {
    var $table = 'detalleorden';

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function obtener(){
        $res = $this->db->get('detalleorden');
        if ($res->num_rows() > 0) return $res;
        else return false;
    }

    function obtenerxId($codorden='')
    {
        $res = $this->db->get_where('detalleorden',array('CODORDEN' => $codorden));
        if ($res->num_rows() > 0) return $res->row();
        else return false;
    }

    function guardar($data)
    {
       $this->db->insert('detalleorden',$data);
   }

   function maxCod()
   {        
    $res = $this->db->select_max('coddetalle');
    $res = $this->db->get('detalleorden');    
    return $res;
}
}