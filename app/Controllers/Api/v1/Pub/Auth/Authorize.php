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
		$master = new \App\Models\MasterModel();
		
		
		$result = $master->getMember();
		
		print_r($result);
		
	}
	
	
	public function login()
	{
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//--------------------------------------------------------------------
	
}
