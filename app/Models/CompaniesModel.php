<?php
namespace App\Models;

use CodeIgniter\Model;

class CompaniesModel extends Model{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    // protected $returnType = 'json';
    protected $allowedFields = ["name", "CIF", "shortdesc", "description", "email", "CCC", "status", "logo"];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    // protected $validationRules = [
    //     'name' => 'requiered|min_length[1]max_lenght[100]',
    //     'CIF' => 'requiered|min_length[9]max_lenght[9]',
    //     'shortdesc' => 'permit_empty|max_lenght[100]',
    //     'description' => 'requiered|min_length[1]max_lenght[8000]',
    //     'email' => 'requiered|valid_email',
    //     'CCC' => 'permit_empty|min_length[20]max_lenght[20]',
    //     'status' => 'permit_empty|max_lenght[1]',
    //     'logo' => 'requiered'
    // ];
    
    // public function all(){
    //     return $this->findAll();
    // }
    
}