<?php
namespace App\Models;

use CodeIgniter\Model;

class OwnersModel extends Model{
    protected $table = 'owners';
    protected $allowedFields = ["owner_id", "name", "email", "gender", "status"];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function findOwner($id){
        return $this->select('owner_id, name, email, gender, status')->where('owner_id', $id)->find();
    }

    public function insertOwner($data){
        $data->owner_id = $data->id;
        unset($data->id);
        $ins = $this->insert($data, true);
        return $ins;
    }
}