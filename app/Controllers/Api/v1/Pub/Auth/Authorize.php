<?php namespace App\Controllers\Api\v1\Pub\Auth;


use App\Controllers\ApiController;


class Authorize extends ApiController
{
	
	public function index()
	{
		return view('welcome_message');
	}
	
	public function test()
	{
		$masterModel = new \App\Models\Api\MasterModel();
		
		
		$result = $masterModel->getTestData();
		
//		print_r($result);
		
	}
	
	
	public function login()
	{
		$master = new \App\Models\Api\MasterModel();
		$result = $master->getTestData();
		
		
		
		
//		echo json_encode($result);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//--------------------------------------------------------------------
	
}
