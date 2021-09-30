<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;

use App\Models\UsersModel;

class Auth extends ResourceController
{
	public function pre(){

		return $this->respond(null,200)->setHeader('Content-Type', 'application/json')
			->setHeader('Access-Control-Allow-Origin', 'http://localhost:8000')
			->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
			->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
			->setHeader('Access-Control-Allow-Credentials', 'true');
	}

	public function token()
	{
	    $users= new UsersModel();

        $body=json_decode($this->request->getBody());

      
        $user= $users->where('name',$body->username)->first();
		$key = $this->getKey();

		$iat = time(); // current timestamp value
		$nbf = $iat + 10;
		$exp = $iat + 3600;

        if($user->password==$body->password){
		$payload = array(
			"iss" => "The_claim",
			"aud" => "The_Aud",
			"iat" => $iat, // issued at
			"nbf" => $nbf, //not before in seconds
			"exp" => $exp, // expire time in seconds
			"data" => $user,
		);

		$token = JWT::encode($payload, $key);
		$response = [

			'error' => false,
			'messages' => 'User logged In successfully',
            'id' => $user->id,
            'token' => $token
		];
		return $this->respondCreated($response)
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'application/json')
		->setHeader('Access-Control-Allow-Origin', '*')
		->setHeader('Access-Control-Allow-Methods', 'POST')
		->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        }else{
            $response = [

                'error' => true,
                'messages' => 'Error',

            ];
            return $this->respondCreated($response)
                ->setStatusCode(401)
                ->setHeader('Content-Type', 'application/json')
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Methods', 'POST')
                ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        }
	}
	private function getKey()
    {
        return "my_application_secret";
    }
}
