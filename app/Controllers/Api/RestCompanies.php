<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CompaniesModel;
class RestCompanies extends ResourceController {
	
	protected $modelName = 'App\Models\CompaniesModel';
	protected $format = 'json';

	public function index(){
		$paged = $this->request->getVar("page");
		$offset = 0;
		if(intval($paged) != 1){
			$offset = (intval($paged) - 1)*5;
		}
		$res = $this->model->select('name, CIF, shortdesc, email, status, logo')->limit(5, $offset)->find();
		if(!$res){
			return $this->failNotFound("No hay tantos registros.");
		}
		return $this->respond($res);
	} 

	public function show($id = null){
		// return $id;
		return $this->respond($this->model->like('description', $id)->findAll());
	}

	public function create(){
		$data = $this->request->getJSON();
		$data = json_encode($data);
		$data = json_decode($data);
		if(isset($data->id)){
			log_message('error', 'intento de creación con id repetido en tabla companies.');
			return $this->failValidationError("No puede elegir un id.");
		}
		$company = new CompaniesModel();
		$id = $company->insert($data, true);
	
		return $this->respondCreated($data, "Ha sido creado con éxito.");
	}

	public function update($id = null){
		$dat = $this->request->getJSON();
		$data = json_encode($dat);
		$data = json_decode($data);
		if(isset($data->id) || isset($data->CIF) || isset($data->date) || isset($data->email) ){
			return $this->failValidationError("Los campos id, CIF, email y date no se pueden modificar.");
		}
		$company = new CompaniesModel();
		$i = $company->update($id,(array)$dat);
		return $this->respond($dat, 200, "Modificado con exito.");
	}
}