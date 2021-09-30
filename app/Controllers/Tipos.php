<?php
namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use App\Controllers\BaseController;
use App\Models\ConsultasModel;
use App\Models\TypesModel;
use CodeIgniter\API\ResponseTrait;
class Tipos extends ResourceController

{
    public function index()
    {
        $tipos= new TypesModel();
        $types= $tipos->findAll();
        $response = [

            'error' => false,
            'messages' => $types,

        ];
        return $this->respondCreated($response)
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
