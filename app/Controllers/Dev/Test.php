<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;

class Test extends ServiceController
{
	
	public function index()
	{
		
		$a = file_get_contents("./log.txt");
		
		print_r(json_decode(html_entity_decode($a)));
	}
	
	//--------------------------------------------------------------------
	
}