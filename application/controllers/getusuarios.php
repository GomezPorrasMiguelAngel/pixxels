<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class getusuarios extends CI_Controller {


  public function index()
	{
    $this->load->database();
    $this->load->model('model_usuario');
    $data['u'] = $this->db->get('usuarios');
    //$data['listado']=$this->model_usuario->get_reviews(1);
    //$valoresjson=json_encode($data);
    return $data;
	}
}
