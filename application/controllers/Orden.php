<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Persona_model');
		$this->load->model('Orden_model');
		$this->load->model('Detalleorden_model');
		$this->load->model('Usuario_model');
		$this->load->model('Instituciones_model');
		$this->load->model('Filiacion_model');
		$this->load->helper('url');
	} 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{		
		$data['instituciones'] = $this->Instituciones_model->obtener();		
		$data['filiaciones'] = $this->Filiacion_model->obtener();
		$this->load->view('templates/header');
		$this->load->view('templates/cabeceraAdmin');		
		$this->load->view('Orden/lstOrden');
		$this->load->view('Orden/orden',$data);
		$this->load->view('Orden/trabajo');
		//$this->load->view('Orden/orden');
		$this->load->view('templates/footerAdmin');
	}

	public function guardar()
	{
		$dataIns = array(
			'codclasificacion' => $this->input->post('clasificacion'),
			'codinstitucion' => $this->input->post('origen'),
			'codfiliacion' => $this->input->post('filiacion'),
			'cododontologo' => $this->input->post('odontologo'),
			'codpaciente' => $this->input->post('paciente'),
			'adherente' => $this->input->post('adherente'),
			'fecharecepcion' => date('Y-m-d', strtotime($this->input->post('recepcion'))),
			'fechaentrega' => date('Y-m-d', strtotime($this->input->post('entrega')))
			);
		$codOrden = $this->Orden_model->guardar($dataIns);

		$max = $this->Detalleorden_model->maxCod();
		$dataIns2 = array(
			'codorden' => $codOrden,
			'coddetalle' => $codOrden,
			'piezasCoronas' => $this->input->post('pCoronas'),
			'numeroCoronas' => $this->input->post('nCoronas'),
			'piezasApoyos' => $this->input->post('pApoyos'),
			'numeroApoyos' => $this->input->post('nApoyos'),
			'singulares' => $this->input->post('singulares'),
			'plurales' => $this->input->post('plurales'),
			'color' => $this->input->post('color'),
			'codmetalvalor' => $this->input->post('metal'),
			'pesometal' => $this->input->post('peso'),
			'numerocromos' => $this->input->post('cromos'),
			'superior' => $this->input->post('pSuperior'),
			'inferior' => $this->input->post('pInferior'),			
			'fechaInicio' => date('Y-m-d', strtotime($this->input->post('recepcion'))),
			'fechaTermino' => date('Y-m-d', strtotime($this->input->post('entrega')))
			);
		$this->Detalleorden_model->guardar($dataIns2);

	}	

	public function lstOrden()
	{		
		$list = $this->Orden_model->obtenertabla();
		$data = array();
		foreach ($list as $detalleOrden) {
			$row = array();
			$row[] = $detalleOrden->codorden;			
			$row[] = $detalleOrden->origen;
			$row[] = $detalleOrden->odontologo;
			$row[] = $detalleOrden->paciente;
			$row[] = $detalleOrden->fecharecepcion;
			$row[] = $detalleOrden->fechaentrega;
			$row[] = $detalleOrden->clasificacion;
			$row[] = $detalleOrden->estado;
            //add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="editarOrden('."'".$detalleOrden->codorden."'".')"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>';			
			$data[] = $row;
		}
		$output = array("recordsTotal" => $this->Orden_model->count_all(),
			"data" => $data
			);
		echo json_encode($output);
	}

	public function editar($id){
		$output = $this->Orden_model->obtenertablabyId($id);
		echo json_encode($output);
	}

	public function actualizar(){
		$dataIns = array(			
			'codclasificacion' => $this->input->post('clasificacion'),
			'codinstitucion' => $this->input->post('origen'),
			'codfiliacion' => $this->input->post('filiacion'),
			'cododontologo' => $this->input->post('odontologo'),
			'codpaciente' => $this->input->post('paciente'),
			'adherente' => $this->input->post('adherente'),
			'fecharecepcion' => date('Y-m-d', strtotime($this->input->post('recepcion'))),
			'fechaentrega' => date('Y-m-d', strtotime($this->input->post('entrega')))
			);

		$this->Orden_model->actualizarOrden(array('codorden' => $this->input->post('codorden')), $dataIns);
	}

	public function salir()
	{
		redirect('', 'refresh');
	}
}
