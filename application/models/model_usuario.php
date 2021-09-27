<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_usuario extends CI_Model{
  public function __construct() {
    $this->load->database();
}
  public function get_reviews($id) {
    if($id != FALSE) {
      $query = $this->db->get_where('usuarios', array('id' => $id));
      return $query->row_array();
    }
    else {
      return FALSE;
    }
  }
  public function get_allreviews() {
      $query =$this->db->get('usuarios');
      //$query = $this->db->get_where('usuarios');
      return $query->result_array();
  }
  public function get_nombre($nombre,$contrasena) {
    if($nombre != FALSE) {
      $query = $this->db->get_where('usuarios', array('nombre' => $nombre,'contrasena'=>$contrasena));
      
      return $query->row();
    }
    else {
      return FALSE;
    }
  }
  public function delete($id)
{
    $this->db->delete('usuarios', array('id' => $id));
}
function update($id, $nombre, $a_paterno,$a_materno,$telefono,$correo,$estado,$contrasena)
{
    $this->db->where('id', $id);
    $this->db->set('nombre', $nombre);
    $this->db->set('a_paterno', $a_paterno);
    $this->db->set('a_materno', $a_materno);
    $this->db->set('telefono', $telefono);
    $this->db->set('correo', $correo);
    $this->db->set('estado', $estado);
    $this->db->set('contrasena', $contrasena);
    return $this->db->update('usuarios');
}
  public function get_all(){
    $this->load->database();
		$query=$this->db->get('usuarios');
    return $query;
  }


  public function validarcredencial(){
    $this->load->database();
		$query=$this->db->get('usuarios');
    return $query;

  }
}
