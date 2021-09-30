<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
//class Home extends BaseController
class Home extends ResourceController
{
	use ResponseTrait;
	protected $format    = 'json';
	public function index()
	{
		
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		$data['days']=['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
		return $this->respond($data);
		//return view('welcome_message');
	}
}
