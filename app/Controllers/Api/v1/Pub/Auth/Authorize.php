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
		$master = new \App\Models\Api\MasterModel();
		
		
		$result = $master->getMember();
		
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
