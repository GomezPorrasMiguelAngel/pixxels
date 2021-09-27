<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model('model_usuario');
		$data['u'] = $this->db->get('usuarios');
		$this->load->view('catalogo_usuarios', $data);
	}
	public function catalogo2(){
		$this->load->view('catalogo2');
	}
	public function login()
	{
		$this->load->view('welcome_message');
	}
	/*public function show($id) {
		$this->load->database();
		$this->load->model('model_usuario');
		$data['u'] = $this->db->get_where('usuarios',array('id'=> $id));
		$this->load->view('prueba', $data);
	}*/
	public function agregar()
   {
		 $this->load->database();
 		$this->load->model('model_usuario');
		$datos=$this->input->post();
		var_dump($obj);
      $data = array(
				'id'=>0,
            'nombre' =>$this->input->post('nombre') ,
            'a_paterno' => $this->input->post('a_paterno'),
						'a_materno' => $this->input->post('a_materno'),
						'telefono' => $this->input->post('telefono'),
						'correo' => $this->input->post('correo'),
						'estado' => $this->input->post('estado'),
						'contrasena' => $this->input->post('contrasena')
        );
      $this->db->insert('usuarios', $data);
   }
	 public function actualizar()
    {
 		 $this->load->database();
  		$this->load->model('model_usuario');
 		  $datos=$this->input->post();
       $data = array(
 				'id'=>$this->input->post('id') ,
             'nombre' =>$this->input->post('nombre') ,
             'a_paterno' => $this->input->post('a_paterno'),
 						'a_materno' => $this->input->post('a_materno'),
 						'telefono' => $this->input->post('telefono'),
 						'correo' => $this->input->post('correo'),
 						'estado' => $this->input->post('estado'),
 						'contrasena' => $this->input->post('contrasena')
         );
       $this->db->replace('usuarios', $data);
    }

		public function validar() {
			$msg= "Usuario y/o contraseña incorrectos";
			$this->load->database();
			$this->load->model('model_usuario');
			try {
			$data= $this->db->get_where('usuarios',array('correo'=> $this->input->post('correo')))->row();
			//if($data->correo==$this->input->post('correo')){
			if(!is_null($data)){
			if($this->input->post('correo')== $data->correo){
				session_start();
				$_SESSION['idusuario']=$data->id;
				$_SESSION['correo']=$data->correo;
				$_SESSION['estado']=$data->estado;
				$d=json_encode($data);
				 echo $d;
		}
			else {
				 echo "null";
			}
		}
		else echo "null";
	} catch (Exception $e) {

	}
		}
		public function actualizarestado()
     {
			 session_start();
			 $nuevoestado="";
  		 $this->load->database();
   		$this->load->model('model_usuario');
			$data= $this->db->get_where('usuarios',array('id'=> $_SESSION['idusuario']))->row();
			printf($_SESSION['idusuario']);
			//printf($data);
			if($data->estado=="Inactivo"){
				$nuevoestado="Activo";
			}
				else {
					$nuevoestado="Inactivo";
				}
        $datanew = array(
  				'id'=>$data->id ,
              'nombre' =>$data->nombre ,
              'a_paterno' => $data->a_paterno,
  						'a_materno' => $data->a_materno,
  						'telefono' => $data->telefono,
  						'correo' => $data->correo,
							'estado'=>$nuevoestado,
  						'contrasena' => $data->contrasena
          );
					$_SESSION['estado']=$nuevoestado;
        $this->db->replace('usuarios', $datanew);
     }
	public function eliminar() {
		$this->load->database();
		 $this->load->model('model_usuario');
		 $this->db->delete('usuarios', array('id' => $this->input->post('id')));
	}

	/*public function catalogo()
	{
		$this->load->database();
		$this->load->model('model_usuario');
		$data['listado']=$this->model_usuario->getAll();
		$this->load->view('catalogo_usuarios',$data);
	}*/

	public function p(){
		$this->load->database();
		$this->load->model('model_usuario');
		$data= $this->model_usuario->get_allreviews();
		print_r(json_encode($data));
		return json_encode($data);
	}

	public function p2(){
		$this->load->database();
		$this->load->model('model_usuario');
		$data= $this->model_usuario->get_allreviews();
		echo (json_encode($data));
		return json_encode($data);
	}


}
