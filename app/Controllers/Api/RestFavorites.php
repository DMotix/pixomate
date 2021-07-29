<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CompaniesModel;
use App\Models\FavoritesModel;

use App\Services\InterconetService;

class RestFavorites extends ResourceController {

    public function create(){

        $data = $this->request->getJSON();
        $data = json_encode($data);
		$data = json_decode($data);

        $CompaniesModel = new CompaniesModel();
        $company = $CompaniesModel->where('id', $data->company_id)->findAll();

        if(!$company){
            log_message('error', 'No existe la empresa indicada.', (array)$data);
            return $this->failNotFound("No existe la empresa indicada.");
        }

        $InterconetService = new InterconetService();
        $owner = $InterconetService->findOwner($data->owner_id);

        if(!isset(json_decode($owner)->data->id)){
            return $this->failNotFound("No existe el usuario indicado.");
        }

        $FavoritesModel = new FavoritesModel();
        $find = $FavoritesModel->where('company_id', $data->company_id)->where('owner_id', $data->owner_id)->findAll();

        if($find){
            return $this->failResourceExists('Ya existe.');
        }

        $id = $FavoritesModel->insert((array)$data, true);
        if(!$id){
            return $this->fail("No se pudo insertar.");
        }

        return $this->respondCreated($data, 'Añadido con éxito.');
	}
}