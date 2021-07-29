<?php

namespace App\Services;

use CodeIgniter\Config\BaseService;
use App\Controllers\Api\RestCompanies;
use App\Controllers\Api\RestOwners;

class InterconetService extends BaseService{
    function findOwner($id){
        $RestOwners = new RestOwners();
        return $RestOwners->find($id);
    }
}