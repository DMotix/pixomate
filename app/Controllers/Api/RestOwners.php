<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\OwnersModel;

class RestOwners extends ResourceController {
 
    public function show($id = null){
        
		$curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gorest.co.in/public-api/users?page='.$id.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 5985e7ec464c960cef7597e1abcf1e0aee6658b81020585d740f0eda9943c410'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		return $this->respond($response);
	}

    public function find($id){
        // return $id;
		$curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gorest.co.in/public/v1/users/'.$id.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 5985e7ec464c960cef7597e1abcf1e0aee6658b81020585d740f0eda9943c410'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		return $response;
	}

    public function ownerAll($id){

        $OwnersModel = new OwnersModel();
        $ownerDb = $OwnersModel->findOwner($id);

        if(!$ownerDb){
            $userInfo = $this->find($id);
            $userInfo = json_decode($userInfo);
            if(!isset($userInfo->data->id)){
                return $this->failNotFound("No existe el usuario indicado.");
            }
            $ins = $OwnersModel->insertOwner($userInfo->data);
        } else {
            $userInfo = $ownerDb;
            // var_dump($userInfo);
            // return;
            $userInfo[0]["id"] = $userInfo[0]["owner_id"];
            unset($userInfo[0]["id"]);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gorest.co.in/public/v1/users/'.$id.'/todos',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 5985e7ec464c960cef7597e1abcf1e0aee6658b81020585d740f0eda9943c410'
        ),
        ));

        $userDetails = curl_exec($curl);

        curl_close($curl);

		$userDetails = json_decode($userDetails);
    
        $array = array();
        $array["code"] = 200;
        $array["data"] = array();
        if(!$ownerDb){
            foreach($userInfo->data as $key => $data){
                $array["data"][$key] =  $data;
            }
        } else {
            foreach($userInfo[0] as $key => $data){
                $array["data"][$key] =  $data;
            }
        }
        $array["data"]["posts"] = $userDetails->data;
        return $this->respond($array);
    } 
}