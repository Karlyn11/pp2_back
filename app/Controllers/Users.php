<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
class Users extends ResourceController

{
    public function index()
    {
        $users= new UsersModel();
        $user= $users->select('name')->findAll();
        $response = [

            'error' => false,
            'pacientes' => $user,

        ];
        return $this->respondCreated($response)
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
