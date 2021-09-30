<?php
namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use App\Controllers\BaseController;
use App\Models\ConsultasModel;
use CodeIgniter\API\ResponseTrait;
class Consultas extends ResourceController

{
    public function index()
    {
        $consultas= new ConsultasModel();
        $citas= $consultas->findAll();
        $response = [

            'error' => false,
            'messages' => $citas,

        ];
        return $this->respondCreated($response)
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
